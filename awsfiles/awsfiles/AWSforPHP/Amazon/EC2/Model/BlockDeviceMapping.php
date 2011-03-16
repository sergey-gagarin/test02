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
 * Amazon_EC2_Model_BlockDeviceMapping
 * 
 * Properties:
 * <ul>
 * 
 * <li>VirtualName: string</li>
 * <li>DeviceName: string</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_BlockDeviceMapping extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_BlockDeviceMapping
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>VirtualName: string</li>
     * <li>DeviceName: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'VirtualName' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DeviceName' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the VirtualName property.
     * 
     * @return string VirtualName
     */
    public function getVirtualName() 
    {
        return $this->_fields['VirtualName']['FieldValue'];
    }

    /**
     * Sets the value of the VirtualName property.
     * 
     * @param string VirtualName
     * @return this instance
     */
    public function setVirtualName($value) 
    {
        $this->_fields['VirtualName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the VirtualName and returns this instance
     * 
     * @param string $value VirtualName
     * @return Amazon_EC2_Model_BlockDeviceMapping instance
     */
    public function withVirtualName($value)
    {
        $this->setVirtualName($value);
        return $this;
    }


    /**
     * Checks if VirtualName is set
     * 
     * @return bool true if VirtualName  is set
     */
    public function isSetVirtualName()
    {
        return !is_null($this->_fields['VirtualName']['FieldValue']);
    }

    /**
     * Gets the value of the DeviceName property.
     * 
     * @return string DeviceName
     */
    public function getDeviceName() 
    {
        return $this->_fields['DeviceName']['FieldValue'];
    }

    /**
     * Sets the value of the DeviceName property.
     * 
     * @param string DeviceName
     * @return this instance
     */
    public function setDeviceName($value) 
    {
        $this->_fields['DeviceName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DeviceName and returns this instance
     * 
     * @param string $value DeviceName
     * @return Amazon_EC2_Model_BlockDeviceMapping instance
     */
    public function withDeviceName($value)
    {
        $this->setDeviceName($value);
        return $this;
    }


    /**
     * Checks if DeviceName is set
     * 
     * @return bool true if DeviceName  is set
     */
    public function isSetDeviceName()
    {
        return !is_null($this->_fields['DeviceName']['FieldValue']);
    }




}