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
 * Describe Bundle Tasks  Sample
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
 * sample for Describe Bundle Tasks Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as Amazon_EC2_Model_DescribeBundleTasksRequest
 // object or array of parameters
 // invokeDescribeBundleTasks($service, $request);

                                                                                                
/**
  * Describe Bundle Tasks Action Sample
  * The DescribeBundleTasks operation describes in-progress
  * and recent bundle tasks. Complete and failed tasks are
  * removed from the list a short time after completion.
  * If no bundle ids are given, all bundle tasks are returned.
  *   
  * @param Amazon_EC2_Interface $service instance of Amazon_EC2_Interface
  * @param mixed $request Amazon_EC2_Model_DescribeBundleTasks or array of parameters
  */
  function invokeDescribeBundleTasks(Amazon_EC2_Interface $service, $request) 
  {
      try {
              $response = $service->describeBundleTasks($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        DescribeBundleTasksResponse\n");
                if ($response->isSetResponseMetadata()) { 
                    echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        echo("                RequestId\n");
                        echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                } 
                if ($response->isSetDescribeBundleTasksResult()) { 
                    echo("            DescribeBundleTasksResult\n");
                    $describeBundleTasksResult = $response->getDescribeBundleTasksResult();
                    $bundleTaskList = $describeBundleTasksResult->getBundleTask();
                    foreach ($bundleTaskList as $bundleTask) {
                        echo("                BundleTask\n");
                        if ($bundleTask->isSetInstanceId()) 
                        {
                            echo("                    InstanceId\n");
                            echo("                        " . $bundleTask->getInstanceId() . "\n");
                        }
                        if ($bundleTask->isSetBundleId()) 
                        {
                            echo("                    BundleId\n");
                            echo("                        " . $bundleTask->getBundleId() . "\n");
                        }
                        if ($bundleTask->isSetBundleState()) 
                        {
                            echo("                    BundleState\n");
                            echo("                        " . $bundleTask->getBundleState() . "\n");
                        }
                        if ($bundleTask->isSetStartTime()) 
                        {
                            echo("                    StartTime\n");
                            echo("                        " . $bundleTask->getStartTime() . "\n");
                        }
                        if ($bundleTask->isSetUpdateTime()) 
                        {
                            echo("                    UpdateTime\n");
                            echo("                        " . $bundleTask->getUpdateTime() . "\n");
                        }
                        if ($bundleTask->isSetStorage()) { 
                            echo("                    Storage\n");
                            $storage = $bundleTask->getStorage();
                            if ($storage->isSetS3()) { 
                                echo("                        S3\n");
                                $s3 = $storage->getS3();
                                if ($s3->isSetBucket()) 
                                {
                                    echo("                            Bucket\n");
                                    echo("                                " . $s3->getBucket() . "\n");
                                }
                                if ($s3->isSetPrefix()) 
                                {
                                    echo("                            Prefix\n");
                                    echo("                                " . $s3->getPrefix() . "\n");
                                }
                                if ($s3->isSetAWSAccessKeyId()) 
                                {
                                    echo("                            AWSAccessKeyId\n");
                                    echo("                                " . $s3->getAWSAccessKeyId() . "\n");
                                }
                                if ($s3->isSetUploadPolicy()) 
                                {
                                    echo("                            UploadPolicy\n");
                                    echo("                                " . $s3->getUploadPolicy() . "\n");
                                }
                                if ($s3->isSetUploadPolicySignature()) 
                                {
                                    echo("                            UploadPolicySignature\n");
                                    echo("                                " . $s3->getUploadPolicySignature() . "\n");
                                }
                            } 
                        } 
                        if ($bundleTask->isSetProgress()) 
                        {
                            echo("                    Progress\n");
                            echo("                        " . $bundleTask->getProgress() . "\n");
                        }
                        if ($bundleTask->isSetBundleTaskError()) { 
                            echo("                    BundleTaskError\n");
                            $bundleTaskError = $bundleTask->getBundleTaskError();
                            if ($bundleTaskError->isSetCode()) 
                            {
                                echo("                        Code\n");
                                echo("                            " . $bundleTaskError->getCode() . "\n");
                            }
                            if ($bundleTaskError->isSetMessage()) 
                            {
                                echo("                        Message\n");
                                echo("                            " . $bundleTaskError->getMessage() . "\n");
                            }
                        } 
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
                                                                                            