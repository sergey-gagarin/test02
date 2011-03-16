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
 * Amazon_EC2_Model_BundleInstanceResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>BundleTask: Amazon_EC2_Model_BundleTask</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_BundleInstanceResult extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_BundleInstanceResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>BundleTask: Amazon_EC2_Model_BundleTask</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'BundleTask' => array('FieldValue' => array(), 'FieldType' => array('Amazon_EC2_Model_BundleTask')),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the BundleTask.
     * 
     * @return array of BundleTask BundleTask
     */
    public function getBundleTask() 
    {
        return $this->_fields['BundleTask']['FieldValue'];
    }

    /**
     * Sets the value of the BundleTask.
     * 
     * @param mixed BundleTask or an array of BundleTask BundleTask
     * @return this instance
     */
    public function setBundleTask($bundleTask) 
    {
        if (!$this->_isNumericArray($bundleTask)) {
            $bundleTask =  array ($bundleTask);    
        }
        $this->_fields['BundleTask']['FieldValue'] = $bundleTask;
        return $this;
    }


    /**
     * Sets single or multiple values of BundleTask list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withBundleTask($bundleTask1, $bundleTask2)</code>
     * 
     * @param BundleTask  $bundleTaskArgs one or more BundleTask
     * @return Amazon_EC2_Model_BundleInstanceResult  instance
     */
    public function withBundleTask($bundleTaskArgs)
    {
        foreach (func_get_args() as $bundleTask) {
            $this->_fields['BundleTask']['FieldValue'][] = $bundleTask;
        }
        return $this;
    }   



    /**
     * Checks if BundleTask list is non-empty
     * 
     * @return bool true if BundleTask list is non-empty
     */
    public function isSetBundleTask()
    {
        return count ($this->_fields['BundleTask']['FieldValue']) > 0;
    }




}