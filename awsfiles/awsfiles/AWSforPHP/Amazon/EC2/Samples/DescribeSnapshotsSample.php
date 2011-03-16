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
 * Describe Snapshots  Sample
 */

include_once ('.config.inc.php'); 

/************************************************************************
 * Instantiate Implementation of Amazon EC2
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new Amazon_EC2_Client(AWS_ACCESS_KEY_ID, 
                                       AWS_SECRET_ACCESS_KEY);
 
/************************************************************************
 * Uncomment to try out Mock Service that simulates Amazon_EC2
 * responses without calling Amazon_EC2 service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under Amazon/EC2/Mock tree
 *
 ***********************************************************************/
 // $service = new Amazon_EC2_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Describe Snapshots Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as Amazon_EC2_Model_DescribeSnapshotsRequest
 // object or array of parameters
 // invokeDescribeSnapshots($service, $request);

                                                                                                                                    
/**
  * Describe Snapshots Action Sample
  * Describes the indicated snapshots, or in lieu of that, all snapshots owned by the caller.
  *   
  * @param Amazon_EC2_Interface $service instance of Amazon_EC2_Interface
  * @param mixed $request Amazon_EC2_Model_DescribeSnapshots or array of parameters
  */
  function invokeDescribeSnapshots(Amazon_EC2_Interface $service, $request) 
  {
      try {
              $response = $service->describeSnapshots($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        DescribeSnapshotsResponse\n");
                if ($response->isSetDescribeSnapshotsResult()) { 
                    echo("            DescribeSnapshotsResult\n");
                    $describeSnapshotsResult = $response->getDescribeSnapshotsResult();
                    $snapshotList = $describeSnapshotsResult->getSnapshot();
                    foreach ($snapshotList as $snapshot) {
                        echo("                Snapshot\n");
                        if ($snapshot->isSetSnapshotId()) 
                        {
                            echo("                    SnapshotId\n");
                            echo("                        " . $snapshot->getSnapshotId() . "\n");
                        }
                        if ($snapshot->isSetVolumeId()) 
                        {
                            echo("                    VolumeId\n");
                            echo("                        " . $snapshot->getVolumeId() . "\n");
                        }
                        if ($snapshot->isSetStatus()) 
                        {
                            echo("                    Status\n");
                            echo("                        " . $snapshot->getStatus() . "\n");
                        }
                        if ($snapshot->isSetStartTime()) 
                        {
                            echo("                    StartTime\n");
                            echo("                        " . $snapshot->getStartTime() . "\n");
                        }
                        if ($snapshot->isSetProgress()) 
                        {
                            echo("                    Progress\n");
                            echo("                        " . $snapshot->getProgress() . "\n");
                        }
                    }
                } 
                if ($response->isSetResponseMetadata()) { 
                    echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        echo("                RequestId\n");
                        echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                } 

     } catch (Amazon_EC2_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }
                                                        