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
 * Describe Instances  Sample
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
 * sample for Describe Instances Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as Amazon_EC2_Model_DescribeInstancesRequest
 // object or array of parameters
 // invokeDescribeInstances($service, $request);

                                                                                                            
/**
  * Describe Instances Action Sample
  * The DescribeInstances operation returns information about instances that you
  * own.
  * If you specify one or more instance IDs, Amazon EC2 returns information for
  * those instances. If you do not specify instance IDs, Amazon EC2 returns
  * information for all relevant instances. If you specify an invalid instance ID,
  * a fault is returned. If you specify an instance that you do not own, it will
  * not be included in the returned results.
  * Recently terminated instances might appear in the returned results. This
  * interval is usually less than one hour.
  *   
  * @param Amazon_EC2_Interface $service instance of Amazon_EC2_Interface
  * @param mixed $request Amazon_EC2_Model_DescribeInstances or array of parameters
  */
  function invokeDescribeInstances(Amazon_EC2_Interface $service, $request) 
  {
      try {
              $response = $service->describeInstances($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        DescribeInstancesResponse\n");
                if ($response->isSetResponseMetadata()) { 
                    echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        echo("                RequestId\n");
                        echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                } 
                if ($response->isSetDescribeInstancesResult()) { 
                    echo("            DescribeInstancesResult\n");
                    $describeInstancesResult = $response->getDescribeInstancesResult();
                    $reservationList = $describeInstancesResult->getReservation();
                    foreach ($reservationList as $reservation) {
                        echo("                Reservation\n");
                        if ($reservation->isSetReservationId()) 
                        {
                            echo("                    ReservationId\n");
                            echo("                        " . $reservation->getReservationId() . "\n");
                        }
                        if ($reservation->isSetOwnerId()) 
                        {
                            echo("                    OwnerId\n");
                            echo("                        " . $reservation->getOwnerId() . "\n");
                        }
                        if ($reservation->isSetRequesterId()) 
                        {
                            echo("                    RequesterId\n");
                            echo("                        " . $reservation->getRequesterId() . "\n");
                        }
                        $groupNameList  =  $reservation->getGroupName();
                        foreach ($groupNameList as $groupName) { 
                            echo("                    GroupName\n");
                            echo("                        " . $groupName);
                        }	
                        $runningInstanceList = $reservation->getRunningInstance();
                        foreach ($runningInstanceList as $runningInstance) {
                            echo("                    RunningInstance\n");
                            if ($runningInstance->isSetInstanceId()) 
                            {
                                echo("                        InstanceId\n");
                                echo("                            " . $runningInstance->getInstanceId() . "\n");
                            }
                            if ($runningInstance->isSetImageId()) 
                            {
                                echo("                        ImageId\n");
                                echo("                            " . $runningInstance->getImageId() . "\n");
                            }
                            if ($runningInstance->isSetInstanceState()) { 
                                echo("                        InstanceState\n");
                                $instanceState = $runningInstance->getInstanceState();
                                if ($instanceState->isSetCode()) 
                                {
                                    echo("                            Code\n");
                                    echo("                                " . $instanceState->getCode() . "\n");
                                }
                                if ($instanceState->isSetName()) 
                                {
                                    echo("                            Name\n");
                                    echo("                                " . $instanceState->getName() . "\n");
                                }
                            } 
                            if ($runningInstance->isSetPrivateDnsName()) 
                            {
                                echo("                        PrivateDnsName\n");
                                echo("                            " . $runningInstance->getPrivateDnsName() . "\n");
                            }
                            if ($runningInstance->isSetPublicDnsName()) 
                            {
                                echo("                        PublicDnsName\n");
                                echo("                            " . $runningInstance->getPublicDnsName() . "\n");
                            }
                            if ($runningInstance->isSetStateTransitionReason()) 
                            {
                                echo("                        StateTransitionReason\n");
                                echo("                            " . $runningInstance->getStateTransitionReason() . "\n");
                            }
                            if ($runningInstance->isSetKeyName()) 
                            {
                                echo("                        KeyName\n");
                                echo("                            " . $runningInstance->getKeyName() . "\n");
                            }
                            if ($runningInstance->isSetAmiLaunchIndex()) 
                            {
                                echo("                        AmiLaunchIndex\n");
                                echo("                            " . $runningInstance->getAmiLaunchIndex() . "\n");
                            }
                            $productCodeList  =  $runningInstance->getProductCode();
                            foreach ($productCodeList as $productCode) { 
                                echo("                        ProductCode\n");
                                echo("                            " . $productCode);
                            }	
                            if ($runningInstance->isSetInstanceType()) 
                            {
                                echo("                        InstanceType\n");
                                echo("                            " . $runningInstance->getInstanceType() . "\n");
                            }
                            if ($runningInstance->isSetLaunchTime()) 
                            {
                                echo("                        LaunchTime\n");
                                echo("                            " . $runningInstance->getLaunchTime() . "\n");
                            }
                            if ($runningInstance->isSetPlacement()) { 
                                echo("                        Placement\n");
                                $placement = $runningInstance->getPlacement();
                                if ($placement->isSetAvailabilityZone()) 
                                {
                                    echo("                            AvailabilityZone\n");
                                    echo("                                " . $placement->getAvailabilityZone() . "\n");
                                }
                            } 
                            if ($runningInstance->isSetKernelId()) 
                            {
                                echo("                        KernelId\n");
                                echo("                            " . $runningInstance->getKernelId() . "\n");
                            }
                            if ($runningInstance->isSetRamdiskId()) 
                            {
                                echo("                        RamdiskId\n");
                                echo("                            " . $runningInstance->getRamdiskId() . "\n");
                            }
                            if ($runningInstance->isSetPlatform()) 
                            {
                                echo("                        Platform\n");
                                echo("                            " . $runningInstance->getPlatform() . "\n");
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
                                                                                