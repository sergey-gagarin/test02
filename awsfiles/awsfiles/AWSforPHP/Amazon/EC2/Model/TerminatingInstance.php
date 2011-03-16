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
 * Amazon_EC2_Model_TerminatingInstance
 * 
 * Properties:
 * <ul>
 * 
 * <li>InstanceId: string</li>
 * <li>ShutdownState: Amazon_EC2_Model_InstanceState</li>
 * <li>PreviousState: Amazon_EC2_Model_InstanceState</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_TerminatingInstance extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_TerminatingInstance
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>InstanceId: string</li>
     * <li>ShutdownState: Amazon_EC2_Model_InstanceState</li>
     * <li>PreviousState: Amazon_EC2_Model_InstanceState</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'InstanceId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ShutdownState' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_InstanceState'),
        'PreviousState' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_InstanceState'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the InstanceId property.
     * 
     * @return string InstanceId
     */
    public function getInstanceId() 
    {
        return $this->_fields['InstanceId']['FieldValue'];
    }

    /**
     * Sets the value of the InstanceId property.
     * 
     * @param string InstanceId
     * @return this instance
     */
    public function setInstanceId($value) 
    {
        $this->_fields['InstanceId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the InstanceId and returns this instance
     * 
     * @param string $value InstanceId
     * @return Amazon_EC2_Model_TerminatingInstance instance
     */
    public function withInstanceId($value)
    {
        $this->setInstanceId($value);
        return $this;
    }


    /**
     * Checks if InstanceId is set
     * 
     * @return bool true if InstanceId  is set
     */
    public function isSetInstanceId()
    {
        return !is_null($this->_fields['InstanceId']['FieldValue']);
    }

    /**
     * Gets the value of the ShutdownState.
     * 
     * @return InstanceState ShutdownState
     */
    public function getShutdownState() 
    {
        return $this->_fields['ShutdownState']['FieldValue'];
    }

    /**
     * Sets the value of the ShutdownState.
     * 
     * @param InstanceState ShutdownState
     * @return void
     */
    public function setShutdownState($value) 
    {
        $this->_fields['ShutdownState']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ShutdownState  and returns this instance
     * 
     * @param InstanceState $value ShutdownState
     * @return Amazon_EC2_Model_TerminatingInstance instance
     */
    public function withShutdownState($value)
    {
        $this->setShutdownState($value);
        return $this;
    }


    /**
     * Checks if ShutdownState  is set
     * 
     * @return bool true if ShutdownState property is set
     */
    public function isSetShutdownState()
    {
        return !is_null($this->_fields['ShutdownState']['FieldValue']);

    }

    /**
     * Gets the value of the PreviousState.
     * 
     * @return InstanceState PreviousState
     */
    public function getPreviousState() 
    {
        return $this->_fields['PreviousState']['FieldValue'];
    }

    /**
     * Sets the value of the PreviousState.
     * 
     * @param InstanceState PreviousState
     * @return void
     */
    public function setPreviousState($value) 
    {
        $this->_fields['PreviousState']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the PreviousState  and returns this instance
     * 
     * @param InstanceState $value PreviousState
     * @return Amazon_EC2_Model_TerminatingInstance instance
     */
    public function withPreviousState($value)
    {
        $this->setPreviousState($value);
        return $this;
    }


    /**
     * Checks if PreviousState  is set
     * 
     * @return bool true if PreviousState property is set
     */
    public function isSetPreviousState()
    {
        return !is_null($this->_fields['PreviousState']['FieldValue']);

    }




}