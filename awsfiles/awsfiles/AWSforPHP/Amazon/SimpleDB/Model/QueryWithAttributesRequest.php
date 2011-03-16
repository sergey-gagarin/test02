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
 * Amazon_SimpleDB_Model_QueryWithAttributesRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>AttributeName: string</li>
 * <li>DomainName: string</li>
 * <li>QueryExpression: string</li>
 * <li>MaxNumberOfItems: int</li>
 * <li>NextToken: string</li>
 *
 * </ul>
 */ 
class Amazon_SimpleDB_Model_QueryWithAttributesRequest extends Amazon_SimpleDB_Model
{


    /**
     * Construct new Amazon_SimpleDB_Model_QueryWithAttributesRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>AttributeName: string</li>
     * <li>DomainName: string</li>
     * <li>QueryExpression: string</li>
     * <li>MaxNumberOfItems: int</li>
     * <li>NextToken: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'AttributeName' => array('FieldValue' => array(), 'FieldType' => array('string')),
        'DomainName' => array('FieldValue' => null, 'FieldType' => 'string'),
        'QueryExpression' => array('FieldValue' => null, 'FieldType' => 'string'),
        'MaxNumberOfItems' => array('FieldValue' => null, 'FieldType' => 'int'),
        'NextToken' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the AttributeName .
     * 
     * @return array of string AttributeName
     */
    public function getAttributeName() 
    {
        return $this->_fields['AttributeName']['FieldValue'];
    }

    /**
     * Sets the value of the AttributeName.
     * 
     * @param string or an array of string AttributeName
     * @return this instance
     */
    public function setAttributeName($attributeName) 
    {
        if (!$this->_isNumericArray($attributeName)) {
            $attributeName =  array ($attributeName);    
        }
        $this->_fields['AttributeName']['FieldValue'] = $attributeName;
        return $this;
    }
  

    /**
     * Sets single or multiple values of AttributeName list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withAttributeName($attributeName1, $attributeName2)</code>
     * 
     * @param string  $stringArgs one or more AttributeName
     * @return Amazon_SimpleDB_Model_QueryWithAttributesRequest  instance
     */
    public function withAttributeName($stringArgs)
    {
        foreach (func_get_args() as $attributeName) {
            $this->_fields['AttributeName']['FieldValue'][] = $attributeName;
        }
        return $this;
    }  
      

    /**
     * Checks if AttributeName list is non-empty
     * 
     * @return bool true if AttributeName list is non-empty
     */
    public function isSetAttributeName()
    {
        return count ($this->_fields['AttributeName']['FieldValue']) > 0;
    }

    /**
     * Gets the value of the DomainName property.
     * 
     * @return string DomainName
     */
    public function getDomainName() 
    {
        return $this->_fields['DomainName']['FieldValue'];
    }

    /**
     * Sets the value of the DomainName property.
     * 
     * @param string DomainName
     * @return this instance
     */
    public function setDomainName($value) 
    {
        $this->_fields['DomainName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DomainName and returns this instance
     * 
     * @param string $value DomainName
     * @return Amazon_SimpleDB_Model_QueryWithAttributesRequest instance
     */
    public function withDomainName($value)
    {
        $this->setDomainName($value);
        return $this;
    }


    /**
     * Checks if DomainName is set
     * 
     * @return bool true if DomainName  is set
     */
    public function isSetDomainName()
    {
        return !is_null($this->_fields['DomainName']['FieldValue']);
    }

    /**
     * Gets the value of the QueryExpression property.
     * 
     * @return string QueryExpression
     */
    public function getQueryExpression() 
    {
        return $this->_fields['QueryExpression']['FieldValue'];
    }

    /**
     * Sets the value of the QueryExpression property.
     * 
     * @param string QueryExpression
     * @return this instance
     */
    public function setQueryExpression($value) 
    {
        $this->_fields['QueryExpression']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the QueryExpression and returns this instance
     * 
     * @param string $value QueryExpression
     * @return Amazon_SimpleDB_Model_QueryWithAttributesRequest instance
     */
    public function withQueryExpression($value)
    {
        $this->setQueryExpression($value);
        return $this;
    }


    /**
     * Checks if QueryExpression is set
     * 
     * @return bool true if QueryExpression  is set
     */
    public function isSetQueryExpression()
    {
        return !is_null($this->_fields['QueryExpression']['FieldValue']);
    }

    /**
     * Gets the value of the MaxNumberOfItems property.
     * 
     * @return int MaxNumberOfItems
     */
    public function getMaxNumberOfItems() 
    {
        return $this->_fields['MaxNumberOfItems']['FieldValue'];
    }

    /**
     * Sets the value of the MaxNumberOfItems property.
     * 
     * @param int MaxNumberOfItems
     * @return this instance
     */
    public function setMaxNumberOfItems($value) 
    {
        $this->_fields['MaxNumberOfItems']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the MaxNumberOfItems and returns this instance
     * 
     * @param int $value MaxNumberOfItems
     * @return Amazon_SimpleDB_Model_QueryWithAttributesRequest instance
     */
    public function withMaxNumberOfItems($value)
    {
        $this->setMaxNumberOfItems($value);
        return $this;
    }


    /**
     * Checks if MaxNumberOfItems is set
     * 
     * @return bool true if MaxNumberOfItems  is set
     */
    public function isSetMaxNumberOfItems()
    {
        return !is_null($this->_fields['MaxNumberOfItems']['FieldValue']);
    }

    /**
     * Gets the value of the NextToken property.
     * 
     * @return string NextToken
     */
    public function getNextToken() 
    {
        return $this->_fields['NextToken']['FieldValue'];
    }

    /**
     * Sets the value of the NextToken property.
     * 
     * @param string NextToken
     * @return this instance
     */
    public function setNextToken($value) 
    {
        $this->_fields['NextToken']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the NextToken and returns this instance
     * 
     * @param string $value NextToken
     * @return Amazon_SimpleDB_Model_QueryWithAttributesRequest instance
     */
    public function withNextToken($value)
    {
        $this->setNextToken($value);
        return $this;
    }


    /**
     * Checks if NextToken is set
     * 
     * @return bool true if NextToken  is set
     */
    public function isSetNextToken()
    {
        return !is_null($this->_fields['NextToken']['FieldValue']);
    }




}