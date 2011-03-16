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
 * Amazon_EC2_Model_DescribeImageAttributeResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>ImageAttribute: Amazon_EC2_Model_ImageAttribute</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_DescribeImageAttributeResult extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_DescribeImageAttributeResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ImageAttribute: Amazon_EC2_Model_ImageAttribute</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ImageAttribute' => array('FieldValue' => array(), 'FieldType' => array('Amazon_EC2_Model_ImageAttribute')),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the ImageAttribute.
     * 
     * @return array of ImageAttribute ImageAttribute
     */
    public function getImageAttribute() 
    {
        return $this->_fields['ImageAttribute']['FieldValue'];
    }

    /**
     * Sets the value of the ImageAttribute.
     * 
     * @param mixed ImageAttribute or an array of ImageAttribute ImageAttribute
     * @return this instance
     */
    public function setImageAttribute($imageAttribute) 
    {
        if (!$this->_isNumericArray($imageAttribute)) {
            $imageAttribute =  array ($imageAttribute);    
        }
        $this->_fields['ImageAttribute']['FieldValue'] = $imageAttribute;
        return $this;
    }


    /**
     * Sets single or multiple values of ImageAttribute list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withImageAttribute($imageAttribute1, $imageAttribute2)</code>
     * 
     * @param ImageAttribute  $imageAttributeArgs one or more ImageAttribute
     * @return Amazon_EC2_Model_DescribeImageAttributeResult  instance
     */
    public function withImageAttribute($imageAttributeArgs)
    {
        foreach (func_get_args() as $imageAttribute) {
            $this->_fields['ImageAttribute']['FieldValue'][] = $imageAttribute;
        }
        return $this;
    }   



    /**
     * Checks if ImageAttribute list is non-empty
     * 
     * @return bool true if ImageAttribute list is non-empty
     */
    public function isSetImageAttribute()
    {
        return count ($this->_fields['ImageAttribute']['FieldValue']) > 0;
    }




}