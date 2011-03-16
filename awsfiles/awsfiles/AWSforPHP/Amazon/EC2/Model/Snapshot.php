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
 * Amazon_EC2_Model_Snapshot
 * 
 * Properties:
 * <ul>
 * 
 * <li>SnapshotId: string</li>
 * <li>VolumeId: string</li>
 * <li>Status: string</li>
 * <li>StartTime: string</li>
 * <li>Progress: string</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_Snapshot extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_Snapshot
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SnapshotId: string</li>
     * <li>VolumeId: string</li>
     * <li>Status: string</li>
     * <li>StartTime: string</li>
     * <li>Progress: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SnapshotId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'VolumeId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Status' => array('FieldValue' => null, 'FieldType' => 'string'),
        'StartTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Progress' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SnapshotId property.
     * 
     * @return string SnapshotId
     */
    public function getSnapshotId() 
    {
        return $this->_fields['SnapshotId']['FieldValue'];
    }

    /**
     * Sets the value of the SnapshotId property.
     * 
     * @param string SnapshotId
     * @return this instance
     */
    public function setSnapshotId($value) 
    {
        $this->_fields['SnapshotId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SnapshotId and returns this instance
     * 
     * @param string $value SnapshotId
     * @return Amazon_EC2_Model_Snapshot instance
     */
    public function withSnapshotId($value)
    {
        $this->setSnapshotId($value);
        return $this;
    }


    /**
     * Checks if SnapshotId is set
     * 
     * @return bool true if SnapshotId  is set
     */
    public function isSetSnapshotId()
    {
        return !is_null($this->_fields['SnapshotId']['FieldValue']);
    }

    /**
     * Gets the value of the VolumeId property.
     * 
     * @return string VolumeId
     */
    public function getVolumeId() 
    {
        return $this->_fields['VolumeId']['FieldValue'];
    }

    /**
     * Sets the value of the VolumeId property.
     * 
     * @param string VolumeId
     * @return this instance
     */
    public function setVolumeId($value) 
    {
        $this->_fields['VolumeId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the VolumeId and returns this instance
     * 
     * @param string $value VolumeId
     * @return Amazon_EC2_Model_Snapshot instance
     */
    public function withVolumeId($value)
    {
        $this->setVolumeId($value);
        return $this;
    }


    /**
     * Checks if VolumeId is set
     * 
     * @return bool true if VolumeId  is set
     */
    public function isSetVolumeId()
    {
        return !is_null($this->_fields['VolumeId']['FieldValue']);
    }

    /**
     * Gets the value of the Status property.
     * 
     * @return string Status
     */
    public function getStatus() 
    {
        return $this->_fields['Status']['FieldValue'];
    }

    /**
     * Sets the value of the Status property.
     * 
     * @param string Status
     * @return this instance
     */
    public function setStatus($value) 
    {
        $this->_fields['Status']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Status and returns this instance
     * 
     * @param string $value Status
     * @return Amazon_EC2_Model_Snapshot instance
     */
    public function withStatus($value)
    {
        $this->setStatus($value);
        return $this;
    }


    /**
     * Checks if Status is set
     * 
     * @return bool true if Status  is set
     */
    public function isSetStatus()
    {
        return !is_null($this->_fields['Status']['FieldValue']);
    }

    /**
     * Gets the value of the StartTime property.
     * 
     * @return string StartTime
     */
    public function getStartTime() 
    {
        return $this->_fields['StartTime']['FieldValue'];
    }

    /**
     * Sets the value of the StartTime property.
     * 
     * @param string StartTime
     * @return this instance
     */
    public function setStartTime($value) 
    {
        $this->_fields['StartTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the StartTime and returns this instance
     * 
     * @param string $value StartTime
     * @return Amazon_EC2_Model_Snapshot instance
     */
    public function withStartTime($value)
    {
        $this->setStartTime($value);
        return $this;
    }


    /**
     * Checks if StartTime is set
     * 
     * @return bool true if StartTime  is set
     */
    public function isSetStartTime()
    {
        return !is_null($this->_fields['StartTime']['FieldValue']);
    }

    /**
     * Gets the value of the Progress property.
     * 
     * @return string Progress
     */
    public function getProgress() 
    {
        return $this->_fields['Progress']['FieldValue'];
    }

    /**
     * Sets the value of the Progress property.
     * 
     * @param string Progress
     * @return this instance
     */
    public function setProgress($value) 
    {
        $this->_fields['Progress']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Progress and returns this instance
     * 
     * @param string $value Progress
     * @return Amazon_EC2_Model_Snapshot instance
     */
    public function withProgress($value)
    {
        $this->setProgress($value);
        return $this;
    }


    /**
     * Checks if Progress is set
     * 
     * @return bool true if Progress  is set
     */
    public function isSetProgress()
    {
        return !is_null($this->_fields['Progress']['FieldValue']);
    }




}