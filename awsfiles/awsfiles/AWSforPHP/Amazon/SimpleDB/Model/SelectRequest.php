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
 * Amazon_SimpleDB_Model_SelectRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SelectExpression: string</li>
 * <li>NextToken: string</li>
 *
 * </ul>
 */ 
class Amazon_SimpleDB_Model_SelectRequest extends Amazon_SimpleDB_Model
{


    /**
     * Construct new Amazon_SimpleDB_Model_SelectRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SelectExpression: string</li>
     * <li>NextToken: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SelectExpression' => array('FieldValue' => null, 'FieldType' => 'string'),
        'NextToken' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SelectExpression property.
     * 
     * @return string SelectExpression
     */
    public function getSelectExpression() 
    {
        return $this->_fields['SelectExpression']['FieldValue'];
    }

    /**
     * Sets the value of the SelectExpression property.
     * 
     * @param string SelectExpression
     * @return this instance
     */
    public function setSelectExpression($value) 
    {
        $this->_fields['SelectExpression']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SelectExpression and returns this instance
     * 
     * @param string $value SelectExpression
     * @return Amazon_SimpleDB_Model_SelectRequest instance
     */
    public function withSelectExpression($value)
    {
        $this->setSelectExpression($value);
        return $this;
    }


    /**
     * Checks if SelectExpression is set
     * 
     * @return bool true if SelectExpression  is set
     */
    public function isSetSelectExpression()
    {
        return !is_null($this->_fields['SelectExpression']['FieldValue']);
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
     * @return Amazon_SimpleDB_Model_SelectRequest instance
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