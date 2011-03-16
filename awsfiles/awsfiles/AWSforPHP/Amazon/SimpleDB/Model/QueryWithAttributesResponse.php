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
 *  @see Amazon_SimpleDB_Model
 */
require_once ('Amazon/SimpleDB/Model.php');  

    

/**
 * Amazon_SimpleDB_Model_QueryWithAttributesResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>QueryWithAttributesResult: Amazon_SimpleDB_Model_QueryWithAttributesResult</li>
 * <li>ResponseMetadata: Amazon_SimpleDB_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class Amazon_SimpleDB_Model_QueryWithAttributesResponse extends Amazon_SimpleDB_Model
{


    /**
     * Construct new Amazon_SimpleDB_Model_QueryWithAttributesResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>QueryWithAttributesResult: Amazon_SimpleDB_Model_QueryWithAttributesResult</li>
     * <li>ResponseMetadata: Amazon_SimpleDB_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'QueryWithAttributesResult' => array('FieldValue' => null, 'FieldType' => 'Amazon_SimpleDB_Model_QueryWithAttributesResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'Amazon_SimpleDB_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct Amazon_SimpleDB_Model_QueryWithAttributesResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return Amazon_SimpleDB_Model_QueryWithAttributesResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://sdb.amazonaws.com/doc/2007-11-07/');
        $response = $xpath->query('//a:QueryWithAttributesResponse');
        if ($response->length == 1) {
            return new Amazon_SimpleDB_Model_QueryWithAttributesResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct Amazon_SimpleDB_Model_QueryWithAttributesResponse from provided XML. 
                                  Make sure that QueryWithAttributesResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the QueryWithAttributesResult.
     * 
     * @return QueryWithAttributesResult QueryWithAttributesResult
     */
    public function getQueryWithAttributesResult() 
    {
        return $this->_fields['QueryWithAttributesResult']['FieldValue'];
    }

    /**
     * Sets the value of the QueryWithAttributesResult.
     * 
     * @param QueryWithAttributesResult QueryWithAttributesResult
     * @return void
     */
    public function setQueryWithAttributesResult($value) 
    {
        $this->_fields['QueryWithAttributesResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the QueryWithAttributesResult  and returns this instance
     * 
     * @param QueryWithAttributesResult $value QueryWithAttributesResult
     * @return Amazon_SimpleDB_Model_QueryWithAttributesResponse instance
     */
    public function withQueryWithAttributesResult($value)
    {
        $this->setQueryWithAttributesResult($value);
        return $this;
    }


    /**
     * Checks if QueryWithAttributesResult  is set
     * 
     * @return bool true if QueryWithAttributesResult property is set
     */
    public function isSetQueryWithAttributesResult()
    {
        return !is_null($this->_fields['QueryWithAttributesResult']['FieldValue']);

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
     * @return Amazon_SimpleDB_Model_QueryWithAttributesResponse instance
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
        $xml .= "<QueryWithAttributesResponse xmlns=\"http://sdb.amazonaws.com/doc/2007-11-07/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</QueryWithAttributesResponse>";
        return $xml;
    }

}