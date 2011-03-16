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
 * Amazon_EC2_Model_TerminateInstancesResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>TerminatingInstance: Amazon_EC2_Model_TerminatingInstance</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_TerminateInstancesResult extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_TerminateInstancesResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>TerminatingInstance: Amazon_EC2_Model_TerminatingInstance</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'TerminatingInstance' => array('FieldValue' => array(), 'FieldType' => array('Amazon_EC2_Model_TerminatingInstance')),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the TerminatingInstance.
     * 
     * @return array of TerminatingInstance TerminatingInstance
     */
    public function getTerminatingInstance() 
    {
        return $this->_fields['TerminatingInstance']['FieldValue'];
    }

    /**
     * Sets the value of the TerminatingInstance.
     * 
     * @param mixed TerminatingInstance or an array of TerminatingInstance TerminatingInstance
     * @return this instance
     */
    public function setTerminatingInstance($terminatingInstance) 
    {
        if (!$this->_isNumericArray($terminatingInstance)) {
            $terminatingInstance =  array ($terminatingInstance);    
        }
        $this->_fields['TerminatingInstance']['FieldValue'] = $terminatingInstance;
        return $this;
    }


    /**
     * Sets single or multiple values of TerminatingInstance list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withTerminatingInstance($terminatingInstance1, $terminatingInstance2)</code>
     * 
     * @param TerminatingInstance  $terminatingInstanceArgs one or more TerminatingInstance
     * @return Amazon_EC2_Model_TerminateInstancesResult  instance
     */
    public function withTerminatingInstance($terminatingInstanceArgs)
    {
        foreach (func_get_args() as $terminatingInstance) {
            $this->_fields['TerminatingInstance']['FieldValue'][] = $terminatingInstance;
        }
        return $this;
    }   



    /**
     * Checks if TerminatingInstance list is non-empty
     * 
     * @return bool true if TerminatingInstance list is non-empty
     */
    public function isSetTerminatingInstance()
    {
        return count ($this->_fields['TerminatingInstance']['FieldValue']) > 0;
    }




}