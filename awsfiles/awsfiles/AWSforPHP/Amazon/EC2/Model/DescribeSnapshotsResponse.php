<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_EC2
 *  @copyright   Copyright 2008 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2009-03-01
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon EC2 PHP5 Library
 *  Generated: Fri Apr 10 00:20:03 PDT 2009
 * 
 */

/**
 *  @see Amazon_EC2_Model
 */
require_once ('Amazon/EC2/Model.php');  

    

/**
 * Amazon_EC2_Model_DescribeSnapshotsResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>DescribeSnapshotsResult: Amazon_EC2_Model_DescribeSnapshotsResult</li>
 * <li>ResponseMetadata: Amazon_EC2_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_DescribeSnapshotsResponse extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_DescribeSnapshotsResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>DescribeSnapshotsResult: Amazon_EC2_Model_DescribeSnapshotsResult</li>
     * <li>ResponseMetadata: Amazon_EC2_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'DescribeSnapshotsResult' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_DescribeSnapshotsResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct Amazon_EC2_Model_DescribeSnapshotsResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return Amazon_EC2_Model_DescribeSnapshotsResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://ec2.amazonaws.com/doc/2009-03-01/');
        $response = $xpath->query('//a:DescribeSnapshotsResponse');
        if ($response->length == 1) {
            return new Amazon_EC2_Model_DescribeSnapshotsResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct Amazon_EC2_Model_DescribeSnapshotsResponse from provided XML. 
                                  Make sure that DescribeSnapshotsResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the DescribeSnapshotsResult.
     * 
     * @return DescribeSnapshotsResult DescribeSnapshotsResult
     */
    public function getDescribeSnapshotsResult() 
    {
        return $this->_fields['DescribeSnapshotsResult']['FieldValue'];
    }

    /**
     * Sets the value of the DescribeSnapshotsResult.
     * 
     * @param DescribeSnapshotsResult DescribeSnapshotsResult
     * @return void
     */
    public function setDescribeSnapshotsResult($value) 
    {
        $this->_fields['DescribeSnapshotsResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the DescribeSnapshotsResult  and returns this instance
     * 
     * @param DescribeSnapshotsResult $value DescribeSnapshotsResult
     * @return Amazon_EC2_Model_DescribeSnapshotsResponse instance
     */
    public function withDescribeSnapshotsResult($value)
    {
        $this->setDescribeSnapshotsResult($value);
        return $this;
    }


    /**
     * Checks if DescribeSnapshotsResult  is set
     * 
     * @return bool true if DescribeSnapshotsResult property is set
     */
    public function isSetDescribeSnapshotsResult()
    {
        return !is_null($this->_fields['DescribeSnapshotsResult']['FieldValue']);

    }

    /**
     * Gets the value of the ResponseMetadata.
     * 
     * @return ResponseMetadata ResponseMetadata
     */
    public function getResponseMetadata() 
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseMetadata.
     * 
     * @param ResponseMetadata ResponseMetadata
     * @return void
     */
    public function setResponseMetadata($value) 
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ResponseMetadata  and returns this instance
     * 
     * @param ResponseMetadata $value ResponseMetadata
     * @return Amazon_EC2_Model_DescribeSnapshotsResponse instance
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }


    /**
     * Checks if ResponseMetadata  is set
     * 
     * @return bool true if ResponseMetadata property is set
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<DescribeSnapshotsResponse xmlns=\"http://ec2.amazonaws.com/doc/2009-03-01/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</DescribeSnapshotsResponse>";
        return $xml;
    }

}