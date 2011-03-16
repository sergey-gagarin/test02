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
 * Amazon_EC2_Model_RegisterImageRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>ImageLocation: string</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_RegisterImageRequest extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_RegisterImageRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ImageLocation: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ImageLocation' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the ImageLocation property.
     * 
     * @return string ImageLocation
     */
    public function getImageLocation() 
    {
        return $this->_fields['ImageLocation']['FieldValue'];
    }

    /**
     * Sets the value of the ImageLocation property.
     * 
     * @param string ImageLocation
     * @return this instance
     */
    public function setImageLocation($value) 
    {
        $this->_fields['ImageLocation']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ImageLocation and returns this instance
     * 
     * @param string $value ImageLocation
     * @return Amazon_EC2_Model_RegisterImageRequest instance
     */
    public function withImageLocation($value)
    {
        $this->setImageLocation($value);
        return $this;
    }


    /**
     * Checks if ImageLocation is set
     * 
     * @return bool true if ImageLocation  is set
     */
    public function isSetImageLocation()
    {
        return !is_null($this->_fields['ImageLocation']['FieldValue']);
    }




}