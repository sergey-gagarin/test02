<?php
/**
 * 
 * Killersoft stream wrapper for Amazon S3.
 * 
 * Requires PHP 5. Developed for, and then open-sourced by, 
 * Mashery.com <http://mashery.com>.
 * 
 * @category Killersoft
 * 
 * @package Killersoft_Wrapper_S3
 * 
 * @author Clay Loveless <clay@killersoft.com>
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 * Copyright (c) 2007-2008, Clay Loveless. All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 
 * * Redistributions of source code must retain the above copyright
 *   notice, this list of conditions and the following disclaimer.
 * 
 * * Redistributions in binary form must reproduce the above
 *   copyright notice, this list of conditions and the following
 *   disclaimer in the documentation and/or other materials provided
 *   with the distribution.
 * 
 * * Neither the name of Killersoft nor the names of its
 *   contributors may be used to endorse or promote products derived
 *   from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 * 
 * @version $Id: S3.php 13199 2009-03-05 22:18:20Z clay $
 * 
 * @todo Finish symlink behavior
 * 
 * @todo Handle pseudo-directory deletion properly (don't delete if not empty)
 * 
 * @todo Implement recursive directory removal via context option
 * 
 * @todo Confirm use of ETag to confirm successful transmissions; Not working
 * presently in stream_flush(). (It works, it's just not returning false to the write.)
 * 
 * @todo Support interface for HTTP client methods
 * 
 * @todo Split up mkdir() method
 * 
 * @todo unit tests
 * 
 * @todo cleanup
 * 
 * @todo documentation
 * 
 */
class Killersoft_Wrapper_S3 {
    
    /**
     * 
     * Remote path to object or bucket
     * 
     * @var string
     * 
     */
    protected $_path;
    
    /**
     * 
     * Mode used to open the stream
     * 
     * @var string
     *
     */
    protected $_mode;
    
    /**
     * 
     * Body buffer for stream_write
     * 
     * @var string
     */
    protected $_body;
        
    /**
     * 
     * List object from directory listing request
     * 
     * @var object
     * 
     */
    protected $_list;
    
    /**
     * 
     * List array, a simplified representation of the ListBucketResponse.
     * 
     * @var array
     * 
     */
    protected $_list_array;
    
    /**
     * 
     * Context options passed to function using this wrapper.
     * 
     * @var array
     * 
     */
    protected $_context_options = array();
    
    /**
     * 
     * Response message object
     * 
     * @var object
     * 
     */
    protected $_message;
    
    /**
     * 
     * Position in the object.
     * 
     * @var int
     * 
     */
    protected $_position = 0;
    
    /**
     * 
     * Stat data about the current request
     * 
     * @var array
     * 
     */
    protected $_stat = array();
    
    /**
     * 
     * Stat cache to reduce the frequency of HEAD calls.
     * 
     * @var array
     * 
     */
    protected static $_stat_cache = array();

    /**
     * 
     * Directory list cache to reduce the frequency of GET bucket calls.
     * 
     * @var array
     * 
     */
    protected static $_dir_cache = array();
    
    /**
     * 
     * Keep track of the sequence of the path we take.
     * 
     * @var string
     * 
     */
    protected $_call_stack = array();
    
    /**
     * 
     * Keep track of stream options
     * 
     * @var bool
     * 
     */
    protected $_report_errors = false;
    
    /**
     * 
     * Constructed?
     * 
     * We have to do this because the stream wrappers are so flaky/unpredictable
     * about calling constructors. Some versions of PHP call the constructor,
     * some don't. 
     * 
     * @var bool
     * 
     */
    protected $_constructed = false;
    
    /**
     * 
     * S3 Service object
     * 
     * @var Killersoft_Service_Amazon_S3
     * 
     */
    protected $_s3;
    
    /**
     * 
     * Constructor.
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        // This check is necessary due to buggy constructor calling behavior
        // in PHP <= 5.2.1
        if (! $this->_constructed) {

            $this->_s3 = new Killersoft_Service_Amazon_S3();
        
            // constructed
            $this->_constructed = true;
        }        
    }

    /** 
     * 
     * Registers the wrapper if it hasn't been registered already.
     * 
     * @return void
     * 
     */
    public static function selfRegister()
    {
        $list = stream_get_wrappers();
        if (! in_array('s3', $list)) {
            stream_wrapper_register('s3', 'Killersoft_Wrapper_S3');
        }
    }

    /**
     * 
     * In the context of a web service, this API method doesn't do much.
     * 
     * @param string $path Specifies the URL to work with.
     * 
     * @param string $mode Mode used to open the file. 
     * 
     * @param int $options Flags set by the streams API.
     * 
     * @param string $opened_path Reference to a previously opened path
     * 
     * @return bool
     * 
     */
    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $this->_call_stack[] = 'stream_open';

        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
        
        $this->_s3->pathify($path, 's3://');
        $this->_mode = $mode;
        $this->_position = 0;
        
        if ($options & STREAM_REPORT_ERRORS) {
            $this->_report_errors = true;
        }
        
        // make sure we can use fopen() on remote location
        if (! ini_get('allow_url_fopen')) {
            if ($this->_report_errors) {
                trigger_error('Killersoft_Wrapper_S3: php.ini allow_url_fopen must be true.', E_USER_ERROR);
            }
            return false;
        }
        
        // make sure the mode is sane
        switch ($mode) {
            case 'r':
            case 'r+':
            case 'rb':
            case 'rb+':
            case 'rt':
            case 'rt+':
            case 'w':
            case 'wb':
            case 'wb+':
            case 'wt':
            case 'wt+':
                // all fine
                break;

            case 'a':
            case 'ab':
            case 'at':
                // not supported yet
                if ($this->_report_errors) {
                    trigger_error('Killersoft_Wrapper_S3: Appending to files not currently supported.', E_USER_ERROR);
                }
                return false;

            default:
                // if not one of the above, we don't support this mode
                if ($this->_report_errors) {
                    trigger_error("Killersoft_Wrapper_S3: Mode '$mode' not supported.", E_USER_ERROR);
                }
                return false;
        }
        
        return true;
    }
    
    /**
     * 
     * Release/unlock any resources allocated by the stream.
     * 
     * @return void
     * 
     */
    public function stream_close()
    {
        $this->_call_stack[] = 'stream_close';
        if (is_resource($this->_s3->fp)) {
            fclose($this->_s3->fp);
        }
    }

    /** 
     * 
     * Experimental lock support
     * 
     * @return bool
     * 
     */
    public function stream_lock($flag)
    {
        $this->_call_stack[] = 'stream_lock';
        if ($this->_report_errors) {
            trigger_error('Killersoft_Wrapper_S3: Due to latency in S3 node syncronization, file locking is not practical, and is therefore not implemented.', E_USER_NOTICE);
        }
    }
    
    /**
     * 
     * Return up-to $count bytes of data from the current read/write position
     * as a string. If fewer than $count bytes are available, return as many 
     * are available. If no more data is available, return false.
     * 
     * Also updates the read/write position of the stream by the number of 
     * bytes successfully read.
     * 
     * @param int $count Number of bytes to read
     * 
     * @return string
     * 
     */
    public function stream_read($count)
    {
        $this->_call_stack[] = 'stream_read';

        $this->_s3->setRequestMethod('GET');

        // make sure stat has been called
        if (empty($this->_stat)) {
            $this->url_stat($this->_s3->getPath(), 0);
            $this->_s3->setRequestMethod('GET');
        }

        if (! isset($this->_stat['size']) || $this->_stat['size'] <= 0) {
            // doc has no size
            return '';
        }
        
        // Start from 0, or the last byte read
        $range_begin = $this->_position;
        
        // subtract 1 from count, since we started at 0
        // so $count of 8192 bytes would be 0-8191    
        $range_end = $this->_position + ($count -1);
        
        $this->_s3->setHeader('Range', "bytes={$range_begin}-{$range_end}");
        
        // up to us: if no more data is available, return false or empty string
        if ($this->stream_eof()) {
            return '';
        }
        
        $this->_request();
        
        $this->_position += strlen($this->_message->body);
        
        // Decompress?
        if (! empty($this->_message->headers['Content-Encoding']) &&
            $this->_message->headers['Content-Encoding'] == 'gzip') {

            if (function_exists('gzinflate')) {
                // skip the gzip headers
                $this->_message->body = gzinflate(substr($this->_message->body, 10));
            }
        }
        
        return $this->_message->body;
        
    }
    
    /**
     * 
     * Writes the data to S3 object specified, and returns the number of bytes
     * successfully written.
     *
     * Appends data written data to $this->_body buffer until complete, then
     * sent as a single PUT to S3. Necessary because S3 does not permit 
     * streaming PUTs.
     * 
     * @todo Optionally write out to temporary file OR use a context setting
     * to let us read directly from a source file without needing to use 
     * a temporary file.
     * 
     * @param string $data Data to write.
     * 
     */
    public function stream_write($data)
    {
        $this->_call_stack[] = 'stream_write';

        $len = strlen($data);

        $this->_s3->setRequestMethod('PUT');
        if ($current_len = $this->_s3->getHeader('Content-Length')) {
            $this->_s3->setHeader('Content-Length', $current_len + $len);
        } else {
            $this->_s3->setHeader('Content-Length', $len);
        }
        $this->_body .= $data;
                
        $this->_position += $len;
        
        return $len;
    }
    
    /**
     * 
     * Get the current stream position.
     * 
     * @return int The current position in the stream
     * 
     */
    public function stream_tell()
    {
        $this->_call_stack[] = 'stream_tell';
        return $this->_position;
    }
    
    /**
     * 
     * Checks the stream end-of-file condition
     * 
     * @return bool Is the stream position at the end of the stream?
     * 
     */
    public function stream_eof()
    {
        $this->_call_stack[] = 'stream_eof';
        
        if (! isset($this->_stat['size']) || $this->_position >= $this->_stat['size']) {
            return true;
        }
        return false;
    }
    
    /**
     * 
     * Update the current read/write position in the stream.
     * 
     * @param int $offset How many bytes to move the position
     * 
     * @param int $whence Where to start counting from
     * 
     * @return bool Was the position adjusted successfully?
     * 
     */
    public function stream_seek($offset, $whence)
    {
        $this->_call_stack[] = 'stream_seek';

        switch ($whence) {
            case SEEK_SET:
                if (($offset >= 0) && ($offset < $this->_stat['size'])) {
                    $this->_position = $offset;
                    return true;
                } else {
                    return false;
                }
                break;
            
            case SEEK_CUR:
                if (($offset >= 0) && (($this->_position + $offset) < $this->_stat['size'])) {
                    $this->_position += $offset;
                    return true;
                } else {
                    return false;
                }
                break;
                
            case SEEK_END:
                if (($this->_stat['size'] + $offset) >= 0) {
                    $this->_position = $this->_stat['size'] + $offset;
                    return true;
                } else {
                    return false;
                }
                break;
                
            default:
                return false;
        }
    }
    
    /** 
     * 
     * Flush data to the stream as needed.
     * 
     * @return bool 
     *
     */
    public function stream_flush()
    {
        $this->_call_stack[] = 'stream_flush';

        // If stream_write is in the call_stack, we still need to send!
        if (in_array('stream_write', $this->_call_stack)) {
            
            // PUT Request
            
            // What is the content type that's been set?
            $set_content_type = $this->_checkContextSetting('content-type', false);

            // Should we try to set type automatically?
            $auto_type = $this->_checkContextSetting('auto_type', true);

            if ($auto_type && !$set_content_type) {
                $this->_s3->guessContentType();
            }
            
            // make sure content type is set in the message
            if ($set_content_type !== false) {
                $this->_s3->setHeader('Content-Type', $set_content_type);
            }
            
            // Now that we've done that, double-check: should we really be 
            // auto-compressing?
            if (function_exists('gzcompress')) {
                $auto_compress = $this->_checkContextSetting('auto_compress', false);
                if (is_array($auto_compress)) {
                    
                    $auto_compress_level = $this->_checkContextSetting('auto_compress_level', 9);
                    
                    $content_type = $this->_s3->getHeader('Content-Type');
                    foreach ($auto_compress as $type) {
                        if ($type == $content_type) {
                        
                            // replace body with gzipped version
                            $this->_body = gzencode($this->_body, $auto_compress_level);
                            $this->_s3->setHeader('Content-Encoding', 'gzip');
                        
                        }
                    }
                }
            }

            // calculate md5 so we can confirm successful transfer of number
            // of bytes we sent
            $expected_etag = hash('md5', $this->_body);
            $this->_s3->setBody($this->_body);
            
            $this->_request();
            
            // response message should have a quote-wrapped ETag that matches
            if (isset($this->_message->headers['ETag']) &&
                $this->_message->headers['ETag'] == '"'.$expected_etag.'"') {
                
                return true;
                   
            } else {
                if ($this->_report_errors) {
                    trigger_error('Killersoft_Wrapper_S3: ETag on uploaded data did not match the input data. Possible transmission corruption.', E_USER_WARNING);
                }
                return false;
            }
            
        }

        return true;
    }
        
    /**
     * 
     * Attempts to remove the object at the specified path. Returns **TRUE** 
     * on success, **FALSE** on failure.
     * 
     * @param string $path Path to the object to remove
     * 
     * @return bool
     * 
     */
    public function unlink($path)
    {
        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
        
        $this->_call_stack[] = 'unlink';
        $this->_s3->pathify($path, 's3://');
        $this->_s3->setRequestMethod('DELETE');
        $this->_request();

        if ($this->_message->responseCode == 204) {
            return true;
        }
        return false;
        
    }
    
    // Amazon S3 does not currently support a WebDAV request method like
    // MOVE. But, we'll leave the method here in case we can use it someday.
    //
    // public function rename($path_from, $path_to)
    // {
    //     // PHP <= 5.2.1 does not call constructor for rename()
    //     if (version_compare(PHP_VERSION, '5.2.2', '<=')) {
    //         self::__construct();
    //     }
    //     $this->_call_stack[] = 'rename';
    // 
    //     
    // }
    
    /**
     * 
     * Create a bucket on the S3 service. If the path looks like a nested path,
     * treat it a bit differently: just try to create the top-level bucket, 
     * and return true on the rest.
     * 
     * @param string $path Path of the bucket or pseudo-bucket to create
     * 
     * @param int $mode Permissions to set on the bucket
     * 
     * @param int $options Constants flags set by the streams API
     * 
     * @todo Split this into sub-methods
     * 
     */     
    public function mkdir($path, $mode, $options)
    {
        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
        $this->_call_stack[] = 'mkdir';
        
        if ($options & STREAM_REPORT_ERRORS) {
            $this->_report_errors = true;
        }

        $recursive = false;
        if ($options & STREAM_MKDIR_RECURSIVE) {
            $recursive = true;
        }
                
        // interpret permissions
        $mode = decoct($mode);
        
        switch ($mode) {
            case 777:
                $policy = 'public-read-write';
                break;
            case 644:
            case 744:
            case 754:
            case 755:
            case 745:
                $policy = 'public-read';
                break;
            case 640:
            case 740:
            case 750:
            case 650:
                $policy = 'authenticated-read';
                break;
            default:
                $policy = 'private';
        }
    
        $this->_s3->pathify($path, 's3://');
        
        if ($this->_s3->isBucket()) {
            
            // let's actually try to make the bucket
            $this->_s3->setCannedAcl($policy);
            $this->_s3->setRequestMethod('PUT');
            $this->_request();

            if ($this->_message->responseCode == 200) {
                return true;
            }
            return false;

        } else {
            
            // Sub-requests needed here
            $subs3 = new Killersoft_Service_Amazon_S3();

            // make sure pseudo-dirs have trailing slashes
            if (substr($this->_s3->object, -1) != '/') {
                // override the path
                $this->_s3->setPath($this->_s3->bucket . $this->_s3->object . '/');
            }
            
            // Does this pseudo-dir exist already?
            $subs3->reset();
            $subs3->setRequestMethod('HEAD');
            $target = $this->_s3->getPath();
            $subs3->setPath($target);
            $subs3->send();
            $msg = $subs3->getResponseMessage();
            if ($msg->responseCode == 200) {
                // in traditional filesystem, mkdir() fails if a file/dir
                // exists in target location
                if ($this->_report_errors) {
                    trigger_error("Killersoft_Wrapper_S3: File exists at $target", E_USER_WARNING);
                }
                return false;
            }


            // does the bucket already exist?
            // sub-request to find out
            $subs3->reset();
            $subs3->getBucketListing($this->_s3->bucket, array('max-keys' => 1));
            $msg = $subs3->getResponseMessage();
            
            // Can't make this directory if not recursive and 
            // top-level bucket doesn't exist
            if ($msg->responseCode == 404 && !$recursive) {
                if ($this->_report_errors) {
                    trigger_error("Killersoft_Wrapper_S3: Top-level bucket \"{$this->_s3->bucket}\" does not exist, and mkdir() call was not recursive.", E_USER_ERROR);
                }
                return false;
            }
            
            // attempt to make the top-level bucket
            if ($msg->responseCode == 404 && $recursive) {
                $subs3->reset();
                $subs3->setCannedAcl($policy);
                $subs3->setRequestMethod('PUT');
                $subs3->pathify($this->_s3->bucket, 's3://');
                $subs3->send();
                $msg = $subs3->getResponseMessage();
                // can we continue?
                if ($msg->responseCode != 200) {
                    if ($this->_report_errors) {
                        trigger_error("Killersoft_Wrapper_S3: Could not create top-level bucket \"{$this->_s3->bucket}\"", E_USER_ERROR);
                    }
                    return false;
                }
            }
            
            // top-level bucket is in place, attempt to create 
            // pseudo-dir
            // make sure we know all the levels, in case of recursive request
            $path_parts = explode('/', substr($this->_s3->object, 1));
            
            $curr_level = $this->_s3->bucket.'/';
            $first_level = $path_parts[0];
            $path_depth = count($path_parts);
            $depth_marker = 0;
            
            $success = false;
            
            foreach ($path_parts as $level) {
                $curr_level .= "{$level}/";
                $subs3->reset();
                $subs3->setRequestMethod('HEAD');
                $subs3->setPath($curr_level);
                $subs3->send();
                $msg = $subs3->getResponseMessage();
                if ($msg->responseCode == 200) {
                    if ($curr_level == $target) {
                        if ($this->_report_errors) {
                            trigger_error("Killersoft_Wrapper_S3: File exists at $target", E_USER_WARNING);
                        }
                        return false;                        
                    }
                    // not the last level, but already exists
                    continue;
                } else {
                    // level dir not found, should we create it?
                    if ($curr_level == $target) {
                        // go ahead and create
                        $subs3->reset();
                        $subs3->setRequestMethod('PUT');
                        $subs3->setPath($curr_level);
                        $subs3->setBody('');
                        $subs3->setHeader('x-amz-meta-pseudo-dir', 'Made by Killersoft_Wrapper_S3');
                        $subs3->setHeader('Content-Type', 'text/plain');
                        $subs3->send();
                        $msg = $subs3->getResponseMessage();
                        if ($msg->responseCode == 200) {
                            $success = true;
                        } else {
                            if ($this->_report_errors) {
                                trigger_error("Killersoft_Wrapper_S3: Could not create pseudo-dir \"{$curr_level}\"", E_USER_ERROR);
                            }
                            return false;                            
                        }
                    } else {
                        // first level or recursive?
                        if ($level == $first_level || $recursive) {
                            $subs3->reset();
                            $subs3->setRequestMethod('PUT');
                            $subs3->setPath($curr_level);
                            $subs3->setBody('');
                            $subs3->setHeader('x-amz-meta-pseudo-dir', 'Made by Killersoft_Wrapper_S3');
                            $subs3->setHeader('Content-Type', 'text/plain');
                            $subs3->send();
                            $msg = $subs3->getResponseMessage();
                            if ($msg->responseCode == 200) {
                                $success = true;
                            } else {
                                if ($this->_report_errors) {
                                    trigger_error("Killersoft_Wrapper_S3: Could not create pseudo-dir \"{$curr_level}\"", E_USER_ERROR);
                                }
                                return false;                            
                            }                            
                        }
                    }
                }
                $depth_marker++;
            }
            
            return $success;
            
        }
        
    }
    
    /**
     * 
     * Attempt to remove a directory. If the directory is not empty, removal
     * will fail.
     * 
     * @param string $path Path of the directory to remove
     * 
     * @param int $options -- context??
     * 
     */
    public function rmdir($path, $options)
    {
        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
        $this->_call_stack[] = 'rmdir';        

        // echo "== rmdir METHOD CALLED ==\n";
        // $args = func_get_args();
        // var_dump($args);
        // 
        // echo "== rmdir context ==\n";
        // $opts = stream_context_get_options($this->context);
        // var_dump($opts);
        
        $this->_s3->setRequestMethod('DELETE');
        $this->_s3->pathify($path, 's3://');
        
        // make sure pseudo-dirs have trailing slashes
        if (!$this->_s3->isBucket()) {
            if (substr($this->_s3->object, -1) != '/') {
                // override the path
                $this->_s3->setPath($this->_s3->bucket . $this->_s3->object . '/');
            }
        }
        $this->_request();
        
        if ($this->_message->responseCode == 204) {
            return true;
        }
        return false;
    }
    
    /**
     * 
     * Called when stream is created to examine the contents of a directory. 
     * 
     * @param string $path Path to examine
     * 
     * @param int $flags Bitwise specification of options
     * 
     * @return bool
     * 
     */
    public function dir_opendir($path, $flags)
    {
        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
        
        
        $this->_call_stack[] = 'dir_opendir';
        //$this->_s3->setHeader('X-Stream-Method', 'dir_opendir');
                
        $this->_s3->pathify($path, 's3://');
        $this->_parseContext();

        $params = array();
        $params['delimiter'] = '/';

        // make sure pseudo-dirs have trailing slashes
        if (!$this->_s3->isBucket()) {
            if (substr($this->_s3->object, -1) != '/') {
                // override the path
                $this->_s3->setPath($this->_s3->bucket);
                $params['prefix'] = substr($this->_s3->object, 1) . '/';
            }
        }

        // now that params are set and path is set, check the cache
        $cache_key = hash('md5', $this->_s3->getPath() . serialize($params));

        $cache = self::_getDirCache($cache_key);
        if ($cache !== false) {
            $this->_list = $cache['list'];
            $this->_message = $cache['message'];
            $verbose = $this->_checkContextSetting('verbose_dir_lists', false);
            $this->_normalizeList($verbose);
            $this->_len = count($this->_list_array);
            $this->_position = 0;
            return true;            
        }

        $this->_list = $this->_s3->getBucketListing($this->_s3->getPath(), $params);
        $this->_message = $this->_s3->getResponseMessage();
        if ($this->_message->responseCode == 200) {
            $verbose = $this->_checkContextSetting('verbose_dir_lists', false);
            $this->_normalizeList($verbose);
            $this->_len = count($this->_list_array);
            $this->_position = 0;
            self::_setDirCache($cache_key, $this->_list, $this->_message);
            return true;
        }
        return false;
    }

    /**
     * 
     * Called in response to readdir()-type requests. Returns a string
     * representing the next filename in the location opened by dir_opendir().
     * 
     * @return mixed Bool false when we reach the end of the list. Otherwise,
     * string representation of the item.
     * 
     */
    public function dir_readdir()
    {
        $this->_call_stack[] = 'dir_readdir';
        
        $next_item = false;
        
        if ($this->_position < $this->_len && $this->_position >= 0) {
            $next_item = $this->_list_array[$this->_position];
            $this->_position += 1;
        }
        
        return $next_item;
    }
    
    /**
     * 
     * Resets the pointer of the diretory list index.
     * 
     * @return bool
     * 
     */
    public function dir_rewinddir()
    {
        $this->_call_stack[] = 'dir_rewinddir';
        $this->_position = 0;
        return true;
    }
    
    /**
     * 
     * Close and release resources allocated by opening the directory.
     * 
     * @return bool
     * 
     */
    public function dir_closedir()
    {
        $this->_call_stack[] = 'dir_closedir';
        $this->_position = 0;
        $this->_list_array = null;
        $this->_list = null;
        return true;
    }

    /**
     * 
     * Called in response to fstat() calls on the stream, and returns an array
     * of similar output.
     * 
     * @return array
     * 
     */
    public function stream_stat()
    {
        $this->_call_stack[] = 'stream_stat';
        $this->url_stat($this->_path, 0);
        return $this->_stat;        
    }

    /** 
     * 
     * Called in response to stat() calls on stream paths. Returns an array
     * that is the best approximation to a traditional filesystem stat call
     * we can manage.
     * 
     * @param string $path Path to collect information from
     * 
     * @param int $flags Bitmap of preferences for behavior of the stat call
     * 
     * @return array
     * 
     */
    public function url_stat($path, $flags)
    {
        // automatic construction is not trustworthy in userspace wrappers
        if (! $this->_constructed) {
            self::__construct();
        }
            
        $this->_call_stack[] = 'url_stat';
       
        $this->_s3->pathify($path, 's3://');
        
        // is_link()-type call?
        $statlink = false;
        if ($flags & STREAM_URL_STAT_LINK) {
            $statlink = true;
        }
        
        // check basename for file extension. if not found, try directory test
        // first
        $dirtest = false;
        $requested_path = $this->_s3->getPath();
        if (strpos($requested_path, '.') === false && substr($requested_path, -1) != '/') {
            $dirtest = true;
            $this->_s3->setPath($requested_path . '/');
        }

        if ($stat = self::_getStatCache($this->_s3->getPath())) {
            $this->_stat = $stat;
            return $stat;
        }
        
        $this->_s3->setRequestMethod('HEAD');
        $this->_request();
        
        // Supporting equivalent of STREAM_URL_STAT_DIR
        if ($this->_message->responseCode == 404) {            
            if ($dirtest) {
                // couldn't find original requested path, but it had no dots and no trailing slash
                // so, try without check for a pseudo-dir
                $this->_s3->setPath($requested_path);
                $this->_request();
            }
        }
        
        // We should have a response from the HEAD calls now. If not, 
        // return a not-found result
        if ($this->_message->responseCode == 404) {
            return false;
        }
        
        // collect x-amz-meta for convenience
        $meta = array();
        foreach ($this->_message->headers as $key => $val) {
            if (substr($key, 0, 11) == 'x-amz-meta-') {
                $metakey = substr($key, 11);
                $meta[$metakey] = $val;
            }
        }
        
        // populate stat array -- see <sys/stat.h> for details about all this
        $stat = array();
        
        // id of device containing file 
        // (nothing useful from S3 to define here)
        $stat['dev'] = 0;
        
        // file serial number 
        // (nothing useful from S3 to define here)
        $stat['ino'] = 0;
        
        // mode of file
        $mode = 0;
        if (! empty($meta['pseudo-symlink'])) {
            $mode = 0170000 & 0120000;
        }
        if (! empty($meta['pseudo-dir'])) {
            if ($mode != 0) {
                $mode = $mode & 0040000;
            } else {
                $mode = 0170000 & 0040000;
            }
        } else {
            // default is a regular file
            $mode = 0170000 & 0100000;
        }
        $stat['mode'] = $mode;
        
        // number of hard links (only one on S3)
        $stat['nlink'] = 1;
        
        // User ID of the file
        // TODO: Populate intelligently from ?acl query
        $stat['uid'] = 0;
        
        // Group ID of the file
        // TODO: Populate intelligently from ?acl query
        $stat['gid'] = 0;
        
        // Device ID 
        // (nothing useful from S3 to define here)
        $stat['rdev'] = 0;
        
        // file size, in bytes (from Content-Length header)
        $size = isset($this->_message->headers['Content-Length']) ? intval($this->_message->headers['Content-Length']) : 0;
        $stat['size'] = $size;
        
        // Time of last access
        // Best we can do is the 'Date' header
        $atime = isset($this->_message->headers['Date']) ? strtotime($this->_message->headers['Date']) : time();
        $stat['atime'] = $atime;
        
        // Last data modification time
        // Get from Last-Modified response header
        $mtime = isset($this->_message->headers['Last-Modified']) ? strtotime($this->_message->headers['Last-Modified']) : 0;
        $stat['mtime'] = $mtime;
        
        // Optimal blocksize for I/O
        // Since S3 bills by the byte, effectively the blocksize is 1 byte
        $stat['blksize'] = 1;
        
        // Blocks allocated for file
        // Since blocksize is 1, blocks allocated is byte size
        $stat['blocks'] = $size;
                
        // get acl info?
        // if (! empty($this->_context_options['aclstat']) && $this->_context_options['aclstat'] === true) {
        //     $this->_method = 'GET';
        //     $this->_request($path . '?acl');            
        // }

        $this->_stat = $stat;
        self::_setStatCache($this->_s3->getPath(), $stat);
        return $stat;        
    }    
    
    /**
     * 
     * Checks the static stat cache for recent results of url_stat calls. 
     * 
     * The stat cache timeout is 2 seconds. Given the sync latency on S3, 
     * a two second cache is reasonable to reduce HEAD calls, as S3 nodes are
     * not likely to update across the system reliably within that span of 
     * time.
     * 
     * @param string $path Path to check in the cache
     * 
     * @return mixed Message object on success, FALSE on cache-miss
     * 
     */
    protected static function _getStatCache($path)
    {
        $now = time();
        
        if (empty(self::$_stat_cache[$path])) {
            return false;
        }
        $cache = self::$_stat_cache[$path];
        
        // too old to use?
        if ($cache['expire'] <= $now) {
            unset(self::$_stat_cache[$path]);
            return false;
        }
        
        // return cached stat
        return $cache['stat'];
    }
    
    /**
     * 
     * Adds a path and its stat() result to the stat cache and sets a two
     * second expiration.
     * 
     * @param string $path Path status to cache
     * 
     * @param array $stat Stat array corresponding to $path
     * 
     * @return void
     * 
     */
    protected static function _setStatCache($path, $stat)
    {
        self::$_stat_cache[$path] = array(
            'expire' => time() + 2,
            'stat'   => $stat
        );
    }

    /**
     * 
     * Checks the static directory list cache for recent results of 
     * dir_opendir calls. 
     * 
     * The dir_opendir cache timeout is 2 seconds. Given the sync latency on S3, 
     * a two second cache is reasonable to reduce GET bucket calls, as S3 
     * nodes are not likely to update across the system reliably within that 
     * span of time.
     * 
     * @param string $path Path to check in the cache
     * 
     * @return mixed Array with list object and message object on success, 
     * FALSE on cache-miss
     * 
     */
    protected static function _getDirCache($cache_key)
    {
        $now = time();
        
        if (empty(self::$_dir_cache[$cache_key])) {
            return false;
        }
        $cache = self::$_dir_cache[$cache_key];
        
        // too old to use?
        if ($cache['expire'] <= $now) {
            unset(self::$_dir_cache[$cache_key]);
            return false;
        }
        
        // return cached list
        return $cache;
    }
    
    /**
     * 
     * Adds a path and its GET bucket result to the dur cache and sets a two
     * second expiration.
     * 
     * @param string $cache_key Cache key hash of path and parameters
     * 
     * @param object $list List object relating to $cache_key
     * 
     * @param object $message Message reponse object
     * 
     * @return void
     * 
     */
    protected static function _setDirCache($cache_key, $list, $message)
    {
        self::$_dir_cache[$cache_key] = array(
            'expire'    => time() + 2,
            'list'      => $list,
            'message'   => $message,
        );
    }
        
    /**
     * 
     * Parses context array in order to properly set S3 headers.
     * 
     * Recognized context keys are:
     * 
     * `content-type`
     * : (string) Specific Content-Type to set for an S3 object.
     * 
     * `auto_type`
     * : (bool) If **TRUE**, an attempt will be made to guess the content type
     * based on the file extension. (not done in this method)
     * 
     * `auto_compress`
     * : (array) Array of Content-Types to automatically compress with gzip 
     * encoding
     * 
     * `auto_compress_level`
     * : (int) Level of gzip compression to apply. Since Amazon S3 charges 
     * by the byte, the default is maximum compression (level 9). There is a 
     * slight performance hit for this level of compression, however. If you 
     * need faster compression, try setting to level 5.
     * 
     * `acl`
     * : (string) Value to set for an x-amz-acl header
     * 
     * `symlink`
     * : (string) Instead of creating the object specified, create a symbolic
     * link at the specified path that points to the value of `symlink`. 
     * Note: Stream Wrappers do not support the symlink() function, so this 
     * is a workaround for that problem.
     * 
     * `x-amz-*`
     * : (string) Any keys beginning with `x-amz-` will be set as metadata 
     * for the request.
     * 
     * `verbose_dir_lists`
     * : (bool) If true, directory lists will not be simple lists, but
     * comma-separated list containing additional information 
     * (filename,size-in-bytes,ETag,filemtime-epoch). May eliminate the need 
     * to do redundant stat() calls.
     * 
     * @return void
     * 
     */
    protected function _parseContext()
    {

        if (empty($this->context)) {
            return;
        }

        // Get the context options
        $opts = stream_context_get_options($this->context);
        if (! empty($opts['s3'])) {
            $this->_context_options = $opts['s3'];
        }
        
        foreach ($this->_context_options as $key => $val) {

            $_key = strtolower($key);
            switch($_key) {
                
                case 'content-type':
                    $this->_s3->setHeader('Content-Type', $val);
                    break;
                    
                case 'acl':
                    $this->_s3->setHeader('x-amz-acl', $val);
                    break;
                    
                case 'symlink':
                    $this->_s3->setHeader('x-amz-meta-pseudo-symlink', $val);
                    break;
                                    
                default:
                    // pass along any x-amz- headers
                    if (substr($_key, 0, 6) == 'x-amz-') {
                        $this->_s3->setHeader($_key, $val);
                    }
                    break;                    
            }
        }
    }
    
    /**
     * 
     * Check a context setting. Returns the context value if found, or returns
     * the specified default if not found.
     * 
     * @param string $key Context key to look for.
     * 
     * @param mixed $default Default value to return if context value is not
     * found with the specified key. Defaults to returning **NULL**.
     * 
     */
    protected function _checkContextSetting($key, $default = null)
    {
        // context may not even be set
        if (empty($this->context)) {
            return $default;
        }
        
        // Get the context options
        $opts = stream_context_get_options($this->context);
        if (! empty($opts['s3'])) {
            $this->_context_options = $opts['s3'];
        }
        
        if (! empty($this->_context_options[$key])) {
            return $this->_context_options[$key];
        } else {
            return $default;
        }
    }

    /**
     * 
     * Parse the context for last-minute options that should be set in the 
     * headers, and then send the request through the 
     * Killersoft_Service_Amazon_S3 client object.
     * 
     * The response message is then set as a local property for easier access.
     * 
     * @return void
     * 
     */
    protected function _request()
    {
        $this->_parseContext();
        $this->_s3->send();
        $this->_message = $this->_s3->getResponseMessage();
    }
    
    /**
     * 
     * Normalize list object into a simple array matching the format
     * of a scandir().
     * 
     * If $verbose is **TRUE**, an item will be listed as follows:
     * 
     * [filename],[bytes],[ETag],[filemtime]
     * 
     * @param bool $verbose If true, return a comma-delimited list of 
     * information per-item instead of just the item name.
     * 
     * @return void
     * 
     */
    protected function _normalizeList($verbose = false)
    {
        $out = array();
        $list = $this->_list;
        
        $prefix = $list->Prefix;
        $prelen = strlen($prefix);
        
        // contents first
        foreach ($list->Contents as $obj) {
            $key = $obj->Key;
            if ($prelen > 0) {
                if (substr($key, 0, $prelen) == $prefix) {
                    $key = substr_replace($key, '', 0, $prelen);
                }
            }
            // key could be blank now after dropping prefix
            if (! empty($key)) {
                if (!$verbose) {
                    $out[] = $key;
                } else {
                    // can't return an array, because PHP internals force type 
                    // to a string
                    $out[] = $key.','.$obj->Size.','.trim($obj->ETag, '"').','.strtotime($obj->LastModified);                    
                }
            }
        }
        
        // then "directories"
        foreach ($list->CommonPrefixes as $obj) {
            $key = $obj->Prefix;
            if ($prelen > 0) {
                if (substr($key, 0, $prelen) == $prefix) {
                    $key = substr_replace($key, '', 0, $prelen);
                }
            }
            $out[] = $key;
        }
        
        if (!$verbose) {
            natsort($out);
        }
        $this->_list_array = array_values($out);
    }
    
}

class Killersoft_Service_Amazon_S3 {

    /**
     * 
     * Resource representing the socket connection to Amazon S3
     * 
     * @var resource
     * 
     */
    public $fp;
    
    /**
     * 
     * Bucket portion of path
     * 
     * @var string
     * 
     */
    public $bucket;
    
    /**
     * 
     * Object/prefix portion of path
     * 
     * @var string
     * 
     */
    public $object;
    
    /**
     * 
     * Error number from the stream_socket_client connection.
     * 
     * @var int
     * 
     */
    protected $_error_number;
    
    /**
     * 
     * Error message from the stream_socket_client connection
     * 
     * @var string
     * 
     */
    protected $_error_message;

    /**
     * 
     * Amazon AWS Access Key ID
     * 
     * @var string
     * 
     */
    protected $_access_key;
    
    /**
     * 
     * Amazon AWS Secret Access Key
     * 
     * @var string
     * 
     */
    protected $_secret_key;

    /**
     * 
     * User Agent string for AWS requests
     * 
     * @var string
     * 
     */
    protected $_user_agent = 'Killersoft_Wrapper_S3/1.0.0';

    /**
     * 
     * Remote path to object or bucket
     * 
     * @var string
     * 
     */
    protected $_path;

    /**
     * 
     * Flag to make sure we don't correct path more than necessary
     * 
     * @var bool
     *
     */
    protected $_pathified = false;

    /**
     * 
     * HTTP Date for requests and auth
     * 
     * @var string
     * 
     */
    protected $_http_date;
    
    /**
     * 
     * Request method
     * 
     * @var string
     * 
     */
    protected $_method;

    /**
     * 
     * Body content for a PUT request
     * 
     * @var string
     * 
     */
    protected $_body;
    
    /**
     * 
     * Request headers to include in request
     * 
     * @var array
     * 
     */
    protected $_headers = array();
    
    /**
     * 
     * Request query string parameters
     * 
     * @var array
     * 
     */
    protected $_query = array();
    
    /**
     * 
     * MD5 Hash to use in a CONTENT-MD5 header request
     * 
     * @var string
     *
     */
    protected $_content_md5;
    
    /**
     * 
     * Content-type for request and authentication
     * 
     * @var string
     * 
     */
    protected $_content_type;

    /**
     * 
     * Response message object
     * 
     * @var object
     * 
     */
    protected $_message;

    /**
     * 
     * Directory list object
     * 
     * @var object
     * 
     */
    protected $_list;

    /**
     * 
     * Log file to write activity
     * 
     * @var string
     * 
     */
    protected $_log;
    
    /**
     * 
     * List of content-types we're willing to guess
     * 
     * @var array
     * 
     */
    protected $_content_types = array(
        '.asc'      => 'text/plain',
        '.asf'      => 'video/x-ms-asf',
        '.asx'      => 'video/x-ms-asf',
        '.avi'      => 'video/x-msvideo',
        '.bin'      => 'application/octet-stream',
        '.bz2'      => 'application/x-bzip',
        '.c'        => 'text/plain',
        '.class'    => 'application/octet-stream',
        '.conf'     => 'text/plain',
        '.cpp'      => 'text/plain',
        '.css'      => 'text/css',
        '.csv'      => 'text/plain',
        '.doc'      => 'application/msword',
        '.dtd'      => 'text/xml',
        '.dvi'      => 'application/x-dvi',
        '.gif'      => 'image/gif',
        '.gz'       => 'application/x-gzip',
        '.htm'      => 'text/html',
        '.html'     => 'text/html',
        '.jpeg'     => 'image/jpeg',
        '.jpg'      => 'image/jpeg',
        '.js'       => 'text/javascript',
        '.json'     => 'application/json',
        '.log'      => 'text/plain',
        '.m3u'      => 'audio/x-mpegurl',
        '.mov'      => 'video/quicktime',
        '.mp3'      => 'audio/mpeg',
        '.mpeg'     => 'video/mpeg',
        '.mpg'      => 'video/mpeg',
        '.ogg'      => 'application/ogg',
        '.pac'      => 'application/x-ns-proxy-autoconfig',
        '.pdf'      => 'application/pdf',
        '.png'      => 'image/png',
        '.ps'       => 'application/postscript',
        '.qt'       => 'video/quicktime',
        '.rtf'      => 'application/rtf',
        '.sig'      => 'application/pgp-signature',
        '.spl'      => 'application/futuresplash',
        '.swf'      => 'application/x-shockwave-flash',
        '.tar.bz2'  => 'application/x-bzip-compressed-tar',
        '.tar.gz'   => 'application/x-tgz',
        '.tar'      => 'application/x-tar',
        '.tbz'      => 'application/x-bzip-compressed-tar',
        '.text'     => 'text/plain',
        '.tgz'      => 'application/x-tgz',
        '.torrent'  => 'application/x-bittorrent',
        '.txt'      => 'text/plain',
        '.wav'      => 'audio/x-wav',
        '.wsdl'     => 'text/xml',
        '.wax'      => 'audio/x-ms-wax',
        '.wma'      => 'audio/x-ms-wma',
        '.wmv'      => 'video/x-ms-wmv',
        '.xbm'      => 'image/x-xbitmap',
        '.xml'      => 'text/xml',
        '.xpm'      => 'image/x-xpixmap',
        '.xsd'      => 'text/xml',
        '.xwd'      => 'image/x-xwindowdump',
        '.zip'      => 'application/zip',        
    );

    /**
     * 
     * Constructor.
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        // Set credentials
        $this->_loadConfig();

        // Set a global date string
        $this->_http_date = gmdate('D, d M Y G:i:s T');        
    }
    
    /**
     * 
     * Reset method properties for re-use
     * 
     * @return void
     * 
     */
    public function reset()
    {
        $this->_message = null;
        $this->_content_type = null;
        $this->_content_md5 = null;
        $this->_query = array();
        $this->_headers = array();
        $this->_body = null;
        $this->_method = null;
        $this->_path = null;
        $this->_pathified = false;
        $this->bucket = null;
        $this->object = null;
    }
     
    /**
     * 
     * Set the request method of the HTTP message
     * 
     * @param string $method The request method name
     * 
     * @return mixed TRUE on success, or FALSE if message isn't a request or 
     * $method isn't a known method.
     * 
     */
    public function setRequestMethod($method)
    {
        $valid_s3_methods = array('GET', 'PUT', 'HEAD', 'DELETE');
        if (in_array($method, $valid_s3_methods)) {
            $this->_method = $method;
            return true;
        }
        return false;
    }

    /**
     * 
     * Sets the body of the HTTP Message
     * 
     * @param string $str The new body
     * 
     * @return void
     * 
     */
    public function setBody($str)
    {
        $this->_body = $str;
        $this->setHeader('Content-Length', strlen($str));
    }

    /**
     * 
     * Set the path of the request
     * 
     * @param string $str The path of the request
     * 
     * @return void
     * 
     */
    public function setPath($str)
    {
        $this->_path = $str;
    }
    
    /**
     * 
     * Get the path of the request
     * 
     * @return string
     * 
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * 
     * Add a header to the request
     * 
     * @param mixed $key Header name, or associative array of key/value pairs
     * 
     * @param string $value Value to assign to the header
     * 
     * @return void
     * 
     */
    public function setHeader($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $val) {
                $this->_headers[$k] = $val;
                if ($k == 'Content-Type') {
                    $this->_content_type = $val;
                }
            }
        } else {
            $this->_headers[$key] = $value;
            if ($key == 'Content-Type') {
                $this->_content_type = $value;
            }
        }
    }
    
    /** 
     * 
     * Fetch a header that's been set
     * 
     * @param string $key Header name
     * 
     */
    public function getHeader($key)
    {
        if (isset($this->_headers[$key])) {
            return $this->_headers[$key];
        }
        return false;
    }

    /**
     * 
     * Set query string parameters for the request.
     * 
     * @param mixed $key Parameter key, or associative array of key/value pairs
     * 
     * @param mixed $value Value to assign to the parameter
     * 
     * @return void
     * 
     */
    public function setQuery($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $val) {
                $this->_query[$k] = $val;
            }
        } else {
            $this->_query[$key] = $value;
        }
    }
    
    /**
     * 
     * Return response message as an object
     * 
     * @return object
     * 
     */
    public function getResponseMessage()
    {
        return $this->_message;
    }

    /**
     * 
     * Return directory list as an object
     * 
     * @return object
     * 
     */
    public function getList()
    {
        return $this->_list;
    }
    
    /**
     * 
     * Performs a GET request on a bucket, parses the XML response and returns
     * an object representing the bucket listing.
     * 
     * @param string $path Path of the bucket
     * 
     * @param array $params Array of parameters to influence the listing 
     * results
     * 
     * @return object
     * 
     */
    public function getBucketListing($path, $params = array())
    {
        $this->setRequestMethod('GET');
        $this->setQuery($params);
        $this->_path = $path;
        $this->send();
        $this->_populateListObject();
        
        return $this->_list;
    }
    
    /**
     * 
     * Make the actual request
     * 
     * NOTE: The seemingly excessive checking of the S3 connection 
     * stream socket client is necessary. S3 has a tendency to drop
     * connections, and since we reuse the connection as much as we 
     * can, we can't always assume that it's still up and valid.
     * 
     */
    public function send()
    {
        $written = false;
        // Auto add certain headers
        $this->_headers['Host'] = 's3.amazonaws.com';
        $this->_headers['Date'] = $this->_http_date;
        $this->_headers['User-Agent'] = $this->_user_agent;
        $this->_headers['Accept'] = '*/*';
        $this->_headers['Accept-Encoding'] = 'gzip, compress';
        $this->_headers['Keep-Alive'] = 300;
        $this->_headers['Connection'] = 'keep-alive';

        // sanitize request - remove control characters and encode whitespace
        $search = array('/[\\x00-\\x1F]/');
        $this->_path = preg_replace($search, '', $this->_path);

        // make sure encoding is sensible and consistant
        $path_parts = explode('/', $this->_path);
        foreach ($path_parts as $pk => $pv) {
            $path_parts[$pk] = urlencode($pv);
        }
        $this->_path = join('/', $path_parts);

        $this->_setAuthHeader();
        
        $request = $this->_path;
        
        // set query string if appropriate
        if (! empty($this->_query)) {
            $request .= '?' . http_build_query($this->_query);
        }        
        
        // open stream
        $this->fp = @stream_socket_client(
            'tcp://s3.amazonaws.com:80', 
            $errno, 
            $errstr, 
            30, 
            STREAM_CLIENT_CONNECT
        );
        // buffered writes not necessary
        if (is_resource($this->fp)) {
            stream_set_write_buffer($this->fp, 0);
        }

                
        // write the request
        $req = "{$this->_method} $request HTTP/1.1\r\n";
        $req = $req . $this->_fetchHeaderString() . "\r\n";

        if ($this->_method == 'PUT') {
            $req .= $this->_body;
        }

        // Log the request message
        $this->_log($req);

        // prepare to handle response
        $this->_newMessageObject();
        $limit_tries = 5;
        $tries = 0;
        
        while (empty($this->_message->info)) {
            if (is_resource($this->fp)) {
                $written = fwrite($this->fp, $req, strlen($req));
            }
            
            // if $written is false, and this is at least the second try, 
            // re-create the pipe
            if (! $written && $tries > 1) {
                // re-open stream
                $this->fp = null;
                $this->fp = stream_socket_client(
                    'tcp://s3.amazonaws.com:80', 
                    $errno, 
                    $errstr, 
                    30, 
                    STREAM_CLIENT_CONNECT
                );
                if ($this->fp) {
                    // buffered writes not necessary
                    stream_set_write_buffer($this->fp, 0);
                
                    $written = fwrite($this->fp, $req, strlen($req));
                }
            }
            if (is_resource($this->fp)) {
                stream_set_timeout($this->fp, 30);

                $raw_header = '';
                while ($line = fgets($this->fp)) {
                    if (substr($line, 0, 4) == 'HTTP') {
                        // log info line
                        $this->_log($line);
                        $this->_message->info = rtrim($line);
                        $this->_parseResponseInfo($line);
                    } else {
                        $raw_header .= $line;
                        if (!chop($line)) break;
                    }
                }
            }
            
            $tries++;
            if ($tries > 1) {
                sleep($tries);
            }
            if ($tries >= $limit_tries) {
                break;
            }
        }
        
        // Log the raw response headers
        $this->_log($raw_header);

        $this->_parseResponseHeader($raw_header);        

        // get the remainder if we expect a body
        if ($this->_method == 'GET') {
            
            // handle chunked Transfer-Encoding
            if (isset($this->_message->headers['Transfer-Encoding']) &&
                $this->_message->headers['Transfer-Encoding'] == 'chunked') {
                
                // decoding with thanks to a snippet from Zend Framework
                do {
                    $chunk = '';
                    $line = @fgets($this->fp, 16);
                    $chunk .= $line;
                    
                    $hexchunksize = ltrim(chop($line), '0');
                    $hexchunksize = strlen($hexchunksize) ? strtolower($hexchunksize) : 0;
                    
                    $chunksize = hexdec(chop($line));
                    if (dechex($chunksize) != $hexchunksize) {
                        echo "INVALID CHUNK SIZE!\n";
                        exit;
                    }
                    $left_to_read = $chunksize;
                    while ($left_to_read > 0) {
                        $line = @fread($this->fp, $left_to_read);
                        $this->_message->body .= $line;
                        $left_to_read -= strlen($line);
                    }
                     $chunk .= @fgets($this->fp, 16);
                } while ($chunksize > 0);

                $this->_message->headers['X-Original-Transfer-Encoding'] = 'chunked';
                $this->_message->headers['Content-Length'] = strlen($this->_message->body);
                unset($this->_message->headers['Transfer-Encoding']);
                
            } else {
                $bytes = 8192;
                if (isset($this->_message->headers['Content-Length'])) {
                    $bytes = intval($this->_message->headers['Content-Length']);
                }
                $this->_message->body = stream_get_contents($this->fp, $bytes);
            }
        }

    }

    /**
     * 
     * Initiates a fresh response message object.
     * 
     * @return void
     * 
     */
    protected function _newMessageObject()
    {
        $this->_message = (object) array(
            'type' => 2,
            'info' => '',
            'httpVersion' => 0,
            'responseCode' => 0,
            'responseStatus' => '',
            'meta' => null,
            'headers' => array(),
            'body' => '',
        );
    }
    
    /**
     * 
     * Initiates a fresh listing object
     * 
     * @return void
     * 
     */
    protected function _newListObject()
    {
        $this->_list = (object) array(
            'Name'          => null,
            'Prefix'        => null,
            'Marker'        => null,
            'MaxKeys'       => 1000,
            'Delimiter'     => '/',
            'IsTruncated'   => false,
            'Contents'      => array(),
            'CommonPrefixes'=> array(),
            'Error'         => null,
        );
    }
    
    /**
     * 
     * Populates the list object using XMLReader. Done because the root node 
     * type is inaccessible using SimpleXML.
     * 
     * @return void
     * 
     */
    protected function _populateListObject()
    {
        $this->_newListObject();        
        
        $reader = new XMLReader();
        if (! empty($this->_message->body)) {
            $reader->XML($this->_message->body);
            while ($reader->read()) {
                switch ($reader->nodeType) {
                    case XMLReader::ELEMENT:
                    
                        switch($reader->localName) {
                            case 'Error':
                                $this->_parseListErrorResponse($reader);
                                break;
                        
                            case 'ListBucketResult':
                                $this->_parseListResultResponse($reader);
                                break;
                            
                            default:
                        }
                        break;
                    
                    default:
                }
            }
            $reader->close();
        }
    }
    
    /**
     * 
     * Parse a successful bucket listing XML response.
     * 
     * @param object $reader XMLReader object
     * 
     * @return void
     * 
     */
    protected function _parseListResultResponse($reader)
    {
        while ($reader->read() && $reader->localName != 'ListBucketResult') {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    $current_node = null;
                    switch ($reader->localName) {
                        case 'Name':
                        case 'Prefix':
                        case 'Marker':
                        case 'MaxKeys':
                        case 'Delimiter':
                        case 'IsTruncated':
                            $current_node = $reader->localName;
                            break;
                        case 'Contents':
                            $this->_list->Contents[] = $this->_parseListContentsNode($reader);
                            break;
                        case 'CommonPrefixes':
                            $this->_list->CommonPrefixes[] = $this->_parseListCommonPrefixesNode($reader);
                            break;
                        default:
                    }
                    break;
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    if (! is_null($current_node)) {
                        $value = $reader->value;
                        if ($current_node == 'IsTruncated') {
                            $value = ($value == 'true') ? true : false;
                        }
                        if ($current_node == 'MaxKeys') {
                            $value = intval($value);
                        }
                        $this->_list->$current_node = $value;
                    }
                    break;
                default:
            }
        }
    }
    
    /**
     * 
     * Parse a Contents node of a ListBucketResult.
     * 
     * @param object $reader XMLReader object
     * 
     * @return object
     * 
     */
    protected function _parseListContentsNode($reader)
    {
        $obj = array();
        while ($reader->read() && $reader->localName != 'Contents') {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    $current_node = null;
                    switch ($reader->localName) {
                        case 'Key':
                        case 'LastModified':
                        case 'ETag':
                        case 'Size':
                        case 'StorageClass':
                            $current_node = $reader->localName;
                            break;
                        case 'Owner':
                            $obj['Owner'] = $this->_parseListContentsOwnerNode($reader);
                            break;
                        default:
                    }
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    if (! is_null($current_node)) {
                        $value = $reader->value;
                        if ($current_node == 'Size') {
                            $value = intval($value);
                        }
                        $obj[$current_node] = $value;
                    }
                    break;
                default:
            }
        }
        return (object) $obj;
    }
    
    /**
     * 
     * Parse an Owner child node of a Contents item
     * 
     * @param object $reader XMLReader object
     * 
     * @return object
     * 
     */
    protected function _parseListContentsOwnerNode($reader)
    {
        $owner = array();
        while ($reader->read() && $reader->localName != 'Owner') {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    $current_node = $reader->localName;
                    break;
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    $owner[$current_node] = $reader->value;
                    break;
                default:
            }
        }
        return (object) $owner;
    }

    /**
     * 
     * Parse a CommonPrefixes node of a ListBucketResult
     * 
     * @param object $reader XMLReader object
     * 
     * @return object
     * 
     */
    protected function _parseListCommonPrefixesNode($reader)
    {
        $prefix = array();
        while ($reader->read() && $reader->localName != 'CommonPrefixes') {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    $current_node = $reader->localName;
                    break;
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    // drop the trailing slash
                    $prefix[$current_node] = substr($reader->value, 0, -1);
                    break;
                default:
            }
        }
        return (object) $prefix;   
    }
    
    /**
     * 
     * Parse an Error XML response from a failed bucket list request
     * 
     * @param object $reader XMLReader object
     * 
     * @return void
     * 
     */
    protected function _parseListErrorResponse($reader)
    {
        $this->_list->Error = array();
        $key = null;
        $val = null;
                
        while ($reader->read() && $reader->localName != 'Error') {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    $key = $reader->localName;
                    break;
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    $val = $reader->value;
                    break;
            }
            $this->_list->Error[$key] = $val;
        }
    }
    
    /**
     * 
     * Converts the stream $http_response_header into an associative array.
     * 
     * @param string $str Headers grabbed from stream
     * 
     * @return array Associative array of headers
     * 
     */
    protected function _parseResponseHeader($str)
    {
        $headers = array();
        $reassembled = array();
        $tmpheader = explode("\r\n", $str);

        if (! empty($tmpheader)) {
            foreach ($tmpheader as $line) {

                // Info line
                // Response info-line begins with HTTP version, such as HTTP/1.1
                $first_white_pos = strpos($line, ' ');
                if (substr($line, 0, 5) == 'HTTP/' && is_numeric(
                    substr($line, 5, ($first_white_pos - 5)))) {
                    $info = $this->_parseResponseInfo($line);
                    foreach ($info as $key => $val) {
                        $this->_message->$key = $val;
                    }
                    $this->_message->info = $line;
                    continue;
                }

                $ltrimmed = ltrim($line);
                // had a space?
                if ($ltrimmed != $line) {
                    // put back with previous line ...
                    $last_key = end(array_keys($reassembled));
                    $reassembled[$last_key] .= "\r\n\r\n" . $line;
                } else {
                    $reassembled[] = $line;
                }
            }

            // Now split headers to associative array
            foreach ($reassembled as $line) {
                $pos = strpos($line, ':');
                if ($pos !== false) {
                    $key = substr($line, 0, $pos);
                    $val = substr($line, $pos + 1);
                    $headers[$key] = trim($val);
                }
            }
            $this->_message->headers = $headers;

        }        
    }
            
    /** 
     * 
     * Split the Response start-line into its parts, which are:
     * 
     *     HTTP_VERSION[space]RESPONSE_CODE[space]RESPONSE_MESSAGE
     * 
     * Note: Somewhat different behavior from ext/http. ext/http doesn't
     * always set the response message if it is not provided. For 
     * consistency's sake, we set it if possible.
     * 
     * @param string $line Start line of the response
     * 
     * @return array
     * 
     */
    protected function _parseResponseInfo($line)
    {
        $split = 2;
        $spaces = substr_count($line, ' ');
        if ($spaces >= 2) $split = 3;

        $parts = explode(' ', $line, $split);

        $v = $parts[0];
        $this->_message->httpVersion = (float) substr($v, 5);         
        $this->_message->responseCode = (int) $parts[1];

        if (! empty($parts[2])) {
            $this->_message->responseStatus = trim($parts[2]);
        }
    }

    /**
     * 
     * Converts request headers array to a string suitable for sending along
     * with an HTTP request.
     * 
     * @return string
     * 
     */
    protected function _fetchHeaderString()
    {
        $headers = $this->_headers;
        $str = '';
        
        foreach ($headers as $key => $val) {
            $str .= "$key: $val\r\n";
        }
        
        return $str;
    }

    /**
     * 
     * Loads configuration from one of a couple places, in this order:
     * 
     * 1. /etc/aws.conf
     * 
     * 2. $HOME/.aws/aws.conf
     * 
     * 3. $_SERVER[CONFIG_VALUE]
     * 
     * Environment values have the final say.
     * 
     * A sample configuration file would look like this (real values NOT 
     * used in this example):
     * 
     * {{
     *     ; Amazon Web Services configuration
     *
     *     ; Amazon Web Services Access Key Id
     *     access_key = "6S94P56PB98XZGK65JW8"
     *
     *     ; Amazon Web Services Secret Access Key
     *     secret_key = "9mcmMZNrkr+ZVDRdgBh2xaedw6pfvKBZ8u7tYuRa"
     *
     *     ; Log activity - used if not blank. Path will be run through the 
     *     ; PHP strftime() function to support granular logging.
     *     log = "/var/log/aws/aws-%Y-%m-%d.log"
     * }}
     * 
     * @return void
     * 
     */
    protected function _loadConfig()
    {
        $config = array();
        
        $global_config = DIRECTORY_SEPARATOR 
            . 'etc' 
            . DIRECTORY_SEPARATOR . 'aws.conf';
        
        $home = null;
        if (isset($_SERVER['HOME'])) {
            $home = $_SERVER['HOME'];
        } elseif (isset($_ENV['HOME'])) {
            $home = $_ENV['HOME'];
        }
        
        $user_config = $home
            . DIRECTORY_SEPARATOR . '.aws' 
            . DIRECTORY_SEPARATOR . 'aws.conf';
        
        // global config first
        if (is_readable($global_config)) {
            $config = parse_ini_file($global_config);
        }

        // merge with user config, user overrides
        if (is_readable($user_config)) {
            $user = parse_ini_file($user_config);
            $config = array_merge($config, $user);
        }
        
        // environment vars have the final say
        $env_vars = array('access_key', 'secret_key');
        foreach ($env_vars as $key) {
            $cap_key = 'AWS_' . strtoupper($key);
            if (!empty($_SERVER[$cap_key])) {
                $config[$key] = $_SERVER[$cap_key];
            }
        }

        // Only printable ASCII characters, minus spaces, allowed. Strip 
        // control chars and whitespace
        $search = '/[^\\x21-\\x7E]/';
        $config['access_key'] = preg_replace($search, '', $config['access_key']);
        $config['secret_key'] = preg_replace($search, '', $config['secret_key']);
        
        $this->_access_key = $config['access_key'];
        $this->_secret_key = $config['secret_key'];
        
        // should we be logging?
        if (isset($config['log']) && !empty($config['log'])) {
            // clean input
            $log = preg_replace($search, '', $config['log']);
            $log = strftime($config['log']);
            if ((file_exists($log) && is_writable($log)) || (is_writable(dirname($log)))) {
                $this->_log = $log;
            }
        }
        
    }
    
    protected function _log($msg)
    {
        if (! empty($this->_log)) {
            file_put_contents($this->_log, $msg, FILE_APPEND | LOCK_EX);
        }
    }

    /**
     * 
     * Guess the content-type based on file extension.
     * 
     * @return void
     * 
     */
    public function guessContentType()
    {
        $basename = basename($this->_path);
        foreach ($this->_content_types as $ext => $type) {
            $extlen = strlen($ext);
            
            if (substr($basename, -$extlen) == $ext) {
                $this->_content_type = $type;
                $this->_headers['Content-Type'] = $type;
                break;
            }
            
        }
    }

 
    /**
     * 
     * Simple method to make sure that any paramter that should be part of a
     * request URL has a slash at the beginning.
     * 
     * @param string $str The string to 'pathify'
     * 
     * @return void
     * 
     */
    public function pathify($str, $prefix = null)
    {        
        if (! $this->_pathified) {
            $path = '';
            $prefixlen = strlen($prefix);
            if (empty($str) || $str == $prefix) {
                $path = '/';
            } elseif (substr($str, 0, $prefixlen) == $prefix) {
                $path = '/' . substr($str, $prefixlen);
            }
        
            // root listing?
            if ($path == '/root' || $path == '/buckets' || $path == '/~') {
                $path = '/';
            }
       
            $this->_path = $path;
            
            // set bucket and object from path
            $slashpos = strpos(substr($path, 1), '/');
            if ($slashpos !== false) {
                // adjust for dropping the first slash above
                $slashpos += 1;
                $this->object = substr($path, $slashpos);
                $this->bucket = substr($path, 0, $slashpos);
            }

            $this->_pathified = true;
        }
    }
    
    /**
     * 
     * Examines the path to determine if the current request looks like an 
     * S3 bucket. Since buckets cannot be nested, this is a pretty easy 
     * thing to check.
     * 
     * @return bool
     * 
     */
    public function isBucket()
    {        
        // only a slash
        if ($this->_path == '/') {
            return true;
        }
        
        // only one slash
        if (substr_count($this->_path, '/') == 1) {
            return true;
        }
        
        // leading and trailing slash only?
        if (substr($this->_path, 0, 1) == '/' && 
            substr($this->_path, -1) == '/' &&
            substr_count($this->_path, '/') == 2) {
            return true;    
        }
        
        // too many slashes, must be an object
        return false;        
    }
    
    /**
     * 
     * Set the prefix query string for directory operations on buckets
     * 
     * @return void
     * 
     */
    public function setPathPrefix()
    {
        if (! $this->isBucket()) {
            // set path to bucket, and prefix to remainder of path
            $slashpos = strpos(substr($this->_path, 1), '/');
            if ($slashpos !== false) {
                // adjust for dropping the first slash above
                $slashpos += 1;                
                $this->_query['prefix'] = substr($this->_path, $slashpos+1);
                $this->_path = substr($this->_path, 0, $slashpos);
            }
        }
    }
    
    /**
     * 
     * Set Canned ACL policy header for a request
     * 
     * @return void
     * 
     */
    public function setCannedAcl($policy) 
    {
        $canned = array('private', 'public-read', 'public-read-write', 'authenticated-read');
        if (in_array($policy, $canned)) {
            $this->setHeader('x-amz-acl', $policy);
        }
    }
 
    /** 
     * 
     * Return a string of canonicalized x-amz headers
     * 
     * @return string
     * 
     */
    protected function _getCanonicalizedAmazonHeaders()
    {
        $amz = array();

        foreach ($this->_headers as $key => $val) {
            if (substr($key, 0, 5) == 'x-amz') {
                if (isset($amz[$key])) {
                    // append if key exists
                    $amz[$key] .= ','.trim($val);
                } else {
                    $amz[$key] = trim($val);
                }
            }
        }
        
        // got anything?
        if (empty($amz)) {
            // nope, return empty string
            return '';
        }
        
        ksort($amz);
        
        $amz_header = '';
        foreach ($amz as $key => $val) {
            $amz_header .= "{$key}:{$val}\n";
        }
        
        return $amz_header;
    }

    /**
     * 
     * Set the authentication header based on what's known about the request
     * 
     * @return void
     * 
     */
    protected function _setAuthHeader()
    {
        
        // String to sign
        $str = '';
        
        if (!empty($this->_method)) {
            $str .= $this->_method . "\n";            
        }
        
        $str .= $this->_content_md5 . "\n";
        
        $str .= $this->_content_type . "\n";
        
        $str .= $this->_http_date . "\n";
        
        $str .= $this->_getCanonicalizedAmazonHeaders();
        
        $path = $this->_path;
        if (substr($path, 0, 1) != '/') {
            $path = '/' . $path;
        }
        
        $str .= $path;

        // Sign the request
        $sig = $this->_createSignature($str);
        
        // Set the auth header
        $this->_headers['Authorization'] = "AWS {$this->_access_key}:{$sig}";
        
    }
 
    /**
     * 
     * Sign a string for AWS authentication
     * 
     * @param string $str Hex string to convert
     * 
     * @return string Converted string
     * 
     */
    protected function _createSignature($str)
    {
        
        $hash = hash_hmac('sha1', $str, $this->_secret_key);

        $sig = $this->_hex2b64($hash);
        
        return $sig;
    }   
    
    protected function _hex2b64($hash) {
        $raw = '';
        $len = strlen($hash);
        for ($i=0; $i < $len; $i+=2) {
            $raw .= chr(hexdec(substr($hash, $i, 2)));
        }
        return base64_encode($raw);
    }

 
    
}