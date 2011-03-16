<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_SimpleDB
 *  @copyright   Copyright 2008 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2007-11-07
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon Simple DB PHP5 Library
 *  Generated: Thu Mar 19 15:32:45 PDT 2009
 * 
 */

/**
 * Query With Attributes  Sample
 */

include_once ('.config.inc.php'); 

/************************************************************************
 * Instantiate Implementation of Amazon SimpleDB
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new Amazon_SimpleDB_Client(AWS_ACCESS_KEY_ID, 
                                       AWS_SECRET_ACCESS_KEY);
 
/************************************************************************
 * Uncomment to try out Mock Service that simulates Amazon_SimpleDB
 * responses without calling Amazon_SimpleDB service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under Amazon/SimpleDB/Mock tree
 *
 ***********************************************************************/
 // $service = new Amazon_SimpleDB_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Query With Attributes Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as Amazon_SimpleDB_Model_QueryWithAttributesRequest
 // object or array of parameters
 // invokeQueryWithAttributes($service, $request);

                                                                
/**
  * Query With Attributes Action Sample
  * The QueryWithAttributes operation returns a set of item names and associated attributes.
  * The query semantics of this operation are identical to the Query operation.
  *   
  * @param Amazon_SimpleDB_Interface $service instance of Amazon_SimpleDB_Interface
  * @param mixed $request Amazon_SimpleDB_Model_QueryWithAttributes or array of parameters
  */
  function invokeQueryWithAttributes(Amazon_SimpleDB_Interface $service, $request) 
  {
      try {
              $response = $service->queryWithAttributes($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        QueryWithAttributesResponse\n");
                if ($response->isSetQueryWithAttributesResult()) { 
                    echo("            QueryWithAttributesResult\n");
                    $queryWithAttributesResult = $response->getQueryWithAttributesResult();
                    $itemList = $queryWithAttributesResult->getItem();
                    foreach ($itemList as $item) {
                        echo("                Item\n");
                        if ($item->isSetName()) 
                        {
                            echo("                    Name\n");
                            echo("                        " . $item->getName() . "\n");
                        }
                        $attributeList = $item->getAttribute();
                        foreach ($attributeList as $attribute) {
                            echo("                    Attribute\n");
                            if ($attribute->isSetName()) 
                            {
                                echo("                        Name\n");
                                echo("                            " . $attribute->getName() . "\n");
                            }
                            if ($attribute->isSetValue()) 
                            {
                                echo("                        Value\n");
                                echo("                            " . $attribute->getValue() . "\n");
                            }
                        }
                    }
                    if ($queryWithAttributesResult->isSetNextToken()) 
                    {
                        echo("                NextToken\n");
                        echo("                    " . $queryWithAttributesResult->getNextToken() . "\n");
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
                    if ($responseMetadata->isSetBoxUsage()) 
                    {
                        echo("                BoxUsage\n");
                        echo("                    " . $responseMetadata->getBoxUsage() . "\n");
                    }
                } 

     } catch (Amazon_SimpleDB_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }
    