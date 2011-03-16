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
 * Amazon_EC2_Model_AllocateAddressResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>ResponseMetadata: Amazon_EC2_Model_ResponseMetadata</li>
 * <li>AllocateAddressResult: Amazon_EC2_Model_AllocateAddressResult</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_AllocateAddressResponse extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_AllocateAddressResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ResponseMetadata: Amazon_EC2_Model_ResponseMetadata</li>
     * <li>AllocateAddressResult: Amazon_EC2_Model_AllocateAddressResult</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_ResponseMetadata'),
        'AllocateAddressResult' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_AllocateAddressResult'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct Amazon_EC2_Model_AllocateAddressResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return Amazon_EC2_Model_AllocateAddressResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://ec2.amazonaws.com/doc/2009-03-01/');
        $response = $xpath->query('//a:AllocateAddressResponse');
        if ($response->length == 1) {
            return new Amazon_EC2_Model_AllocateAddressResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct Amazon_EC2_Model_AllocateAddressResponse from provided XML. 
                                  Make sure that AllocateAddressResponse is a root element");
        }
          
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
     * @return Amazon_EC2_Model_AllocateAddressResponse instance
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
     * Gets the value of the AllocateAddressResult.
     * 
     * @return AllocateAddressResult AllocateAddressResult
     */
    public function getAllocateAddressResult() 
    {
        return $this->_fields['AllocateAddressResult']['FieldValue'];
    }

    /**
     * Sets the value of the AllocateAddressResult.
     * 
     * @param AllocateAddressResult AllocateAddressResult
     * @return void
     */
    public function setAllocateAddressResult($value) 
    {
        $this->_fields['AllocateAddressResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the AllocateAddressResult  and returns this instance
     * 
     * @param AllocateAddressResult $value AllocateAddressResult
     * @return Amazon_EC2_Model_AllocateAddressResponse instance
     */
    public function withAllocateAddressResult($value)
    {
        $this->setAllocateAddressResult($value);
        return $this;
    }


    /**
     * Checks if AllocateAddressResult  is set
     * 
     * @return bool true if AllocateAddressResult property is set
     */
    public function isSetAllocateAddressResult()
    {
        return !is_null($this->_fields['AllocateAddressResult']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<AllocateAddressResponse xmlns=\"http://ec2.amazonaws.com/doc/2009-03-01/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</AllocateAddressResponse>";
        return $xml;
    }

}