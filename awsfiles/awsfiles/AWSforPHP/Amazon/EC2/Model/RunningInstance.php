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
 * Amazon_EC2_Model_RunningInstance
 * 
 * Properties:
 * <ul>
 * 
 * <li>InstanceId: string</li>
 * <li>ImageId: string</li>
 * <li>InstanceState: Amazon_EC2_Model_InstanceState</li>
 * <li>PrivateDnsName: string</li>
 * <li>PublicDnsName: string</li>
 * <li>StateTransitionReason: string</li>
 * <li>KeyName: string</li>
 * <li>AmiLaunchIndex: string</li>
 * <li>ProductCode: string</li>
 * <li>InstanceType: string</li>
 * <li>LaunchTime: string</li>
 * <li>Placement: Amazon_EC2_Model_Placement</li>
 * <li>KernelId: string</li>
 * <li>RamdiskId: string</li>
 * <li>Platform: string</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_RunningInstance extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_RunningInstance
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>InstanceId: string</li>
     * <li>ImageId: string</li>
     * <li>InstanceState: Amazon_EC2_Model_InstanceState</li>
     * <li>PrivateDnsName: string</li>
     * <li>PublicDnsName: string</li>
     * <li>StateTransitionReason: string</li>
     * <li>KeyName: string</li>
     * <li>AmiLaunchIndex: string</li>
     * <li>ProductCode: string</li>
     * <li>InstanceType: string</li>
     * <li>LaunchTime: string</li>
     * <li>Placement: Amazon_EC2_Model_Placement</li>
     * <li>KernelId: string</li>
     * <li>RamdiskId: string</li>
     * <li>Platform: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'InstanceId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ImageId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'InstanceState' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_InstanceState'),
        'PrivateDnsName' => array('FieldValue' => null, 'FieldType' => 'string'),
        'PublicDnsName' => array('FieldValue' => null, 'FieldType' => 'string'),
        'StateTransitionReason' => array('FieldValue' => null, 'FieldType' => 'string'),
        'KeyName' => array('FieldValue' => null, 'FieldType' => 'string'),
        'AmiLaunchIndex' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ProductCode' => array('FieldValue' => array(), 'FieldType' => array('string')),
        'InstanceType' => array('FieldValue' => null, 'FieldType' => 'string'),
        'LaunchTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Placement' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_Placement'),
        'KernelId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'RamdiskId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Platform' => array('FieldValue' => null, 'FieldType' => 'string'),
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
     * @return Amazon_EC2_Model_RunningInstance instance
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
     * Gets the value of the ImageId property.
     * 
     * @return string ImageId
     */
    public function getImageId() 
    {
        return $this->_fields['ImageId']['FieldValue'];
    }

    /**
     * Sets the value of the ImageId property.
     * 
     * @param string ImageId
     * @return this instance
     */
    public function setImageId($value) 
    {
        $this->_fields['ImageId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ImageId and returns this instance
     * 
     * @param string $value ImageId
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withImageId($value)
    {
        $this->setImageId($value);
        return $this;
    }


    /**
     * Checks if ImageId is set
     * 
     * @return bool true if ImageId  is set
     */
    public function isSetImageId()
    {
        return !is_null($this->_fields['ImageId']['FieldValue']);
    }

    /**
     * Gets the value of the InstanceState.
     * 
     * @return InstanceState InstanceState
     */
    public function getInstanceState() 
    {
        return $this->_fields['InstanceState']['FieldValue'];
    }

    /**
     * Sets the value of the InstanceState.
     * 
     * @param InstanceState InstanceState
     * @return void
     */
    public function setInstanceState($value) 
    {
        $this->_fields['InstanceState']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the InstanceState  and returns this instance
     * 
     * @param InstanceState $value InstanceState
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withInstanceState($value)
    {
        $this->setInstanceState($value);
        return $this;
    }


    /**
     * Checks if InstanceState  is set
     * 
     * @return bool true if InstanceState property is set
     */
    public function isSetInstanceState()
    {
        return !is_null($this->_fields['InstanceState']['FieldValue']);

    }

    /**
     * Gets the value of the PrivateDnsName property.
     * 
     * @return string PrivateDnsName
     */
    public function getPrivateDnsName() 
    {
        return $this->_fields['PrivateDnsName']['FieldValue'];
    }

    /**
     * Sets the value of the PrivateDnsName property.
     * 
     * @param string PrivateDnsName
     * @return this instance
     */
    public function setPrivateDnsName($value) 
    {
        $this->_fields['PrivateDnsName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the PrivateDnsName and returns this instance
     * 
     * @param string $value PrivateDnsName
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withPrivateDnsName($value)
    {
        $this->setPrivateDnsName($value);
        return $this;
    }


    /**
     * Checks if PrivateDnsName is set
     * 
     * @return bool true if PrivateDnsName  is set
     */
    public function isSetPrivateDnsName()
    {
        return !is_null($this->_fields['PrivateDnsName']['FieldValue']);
    }

    /**
     * Gets the value of the PublicDnsName property.
     * 
     * @return string PublicDnsName
     */
    public function getPublicDnsName() 
    {
        return $this->_fields['PublicDnsName']['FieldValue'];
    }

    /**
     * Sets the value of the PublicDnsName property.
     * 
     * @param string PublicDnsName
     * @return this instance
     */
    public function setPublicDnsName($value) 
    {
        $this->_fields['PublicDnsName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the PublicDnsName and returns this instance
     * 
     * @param string $value PublicDnsName
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withPublicDnsName($value)
    {
        $this->setPublicDnsName($value);
        return $this;
    }


    /**
     * Checks if PublicDnsName is set
     * 
     * @return bool true if PublicDnsName  is set
     */
    public function isSetPublicDnsName()
    {
        return !is_null($this->_fields['PublicDnsName']['FieldValue']);
    }

    /**
     * Gets the value of the StateTransitionReason property.
     * 
     * @return string StateTransitionReason
     */
    public function getStateTransitionReason() 
    {
        return $this->_fields['StateTransitionReason']['FieldValue'];
    }

    /**
     * Sets the value of the StateTransitionReason property.
     * 
     * @param string StateTransitionReason
     * @return this instance
     */
    public function setStateTransitionReason($value) 
    {
        $this->_fields['StateTransitionReason']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the StateTransitionReason and returns this instance
     * 
     * @param string $value StateTransitionReason
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withStateTransitionReason($value)
    {
        $this->setStateTransitionReason($value);
        return $this;
    }


    /**
     * Checks if StateTransitionReason is set
     * 
     * @return bool true if StateTransitionReason  is set
     */
    public function isSetStateTransitionReason()
    {
        return !is_null($this->_fields['StateTransitionReason']['FieldValue']);
    }

    /**
     * Gets the value of the KeyName property.
     * 
     * @return string KeyName
     */
    public function getKeyName() 
    {
        return $this->_fields['KeyName']['FieldValue'];
    }

    /**
     * Sets the value of the KeyName property.
     * 
     * @param string KeyName
     * @return this instance
     */
    public function setKeyName($value) 
    {
        $this->_fields['KeyName']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the KeyName and returns this instance
     * 
     * @param string $value KeyName
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withKeyName($value)
    {
        $this->setKeyName($value);
        return $this;
    }


    /**
     * Checks if KeyName is set
     * 
     * @return bool true if KeyName  is set
     */
    public function isSetKeyName()
    {
        return !is_null($this->_fields['KeyName']['FieldValue']);
    }

    /**
     * Gets the value of the AmiLaunchIndex property.
     * 
     * @return string AmiLaunchIndex
     */
    public function getAmiLaunchIndex() 
    {
        return $this->_fields['AmiLaunchIndex']['FieldValue'];
    }

    /**
     * Sets the value of the AmiLaunchIndex property.
     * 
     * @param string AmiLaunchIndex
     * @return this instance
     */
    public function setAmiLaunchIndex($value) 
    {
        $this->_fields['AmiLaunchIndex']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the AmiLaunchIndex and returns this instance
     * 
     * @param string $value AmiLaunchIndex
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withAmiLaunchIndex($value)
    {
        $this->setAmiLaunchIndex($value);
        return $this;
    }


    /**
     * Checks if AmiLaunchIndex is set
     * 
     * @return bool true if AmiLaunchIndex  is set
     */
    public function isSetAmiLaunchIndex()
    {
        return !is_null($this->_fields['AmiLaunchIndex']['FieldValue']);
    }

    /**
     * Gets the value of the ProductCode .
     * 
     * @return array of string ProductCode
     */
    public function getProductCode() 
    {
        return $this->_fields['ProductCode']['FieldValue'];
    }

    /**
     * Sets the value of the ProductCode.
     * 
     * @param string or an array of string ProductCode
     * @return this instance
     */
    public function setProductCode($productCode) 
    {
        if (!$this->_isNumericArray($productCode)) {
            $productCode =  array ($productCode);    
        }
        $this->_fields['ProductCode']['FieldValue'] = $productCode;
        return $this;
    }
  

    /**
     * Sets single or multiple values of ProductCode list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withProductCode($productCode1, $productCode2)</code>
     * 
     * @param string  $stringArgs one or more ProductCode
     * @return Amazon_EC2_Model_RunningInstance  instance
     */
    public function withProductCode($stringArgs)
    {
        foreach (func_get_args() as $productCode) {
            $this->_fields['ProductCode']['FieldValue'][] = $productCode;
        }
        return $this;
    }  
      

    /**
     * Checks if ProductCode list is non-empty
     * 
     * @return bool true if ProductCode list is non-empty
     */
    public function isSetProductCode()
    {
        return count ($this->_fields['ProductCode']['FieldValue']) > 0;
    }

    /**
     * Gets the value of the InstanceType property.
     * 
     * @return string InstanceType
     */
    public function getInstanceType() 
    {
        return $this->_fields['InstanceType']['FieldValue'];
    }

    /**
     * Sets the value of the InstanceType property.
     * 
     * @param string InstanceType
     * @return this instance
     */
    public function setInstanceType($value) 
    {
        $this->_fields['InstanceType']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the InstanceType and returns this instance
     * 
     * @param string $value InstanceType
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withInstanceType($value)
    {
        $this->setInstanceType($value);
        return $this;
    }


    /**
     * Checks if InstanceType is set
     * 
     * @return bool true if InstanceType  is set
     */
    public function isSetInstanceType()
    {
        return !is_null($this->_fields['InstanceType']['FieldValue']);
    }

    /**
     * Gets the value of the LaunchTime property.
     * 
     * @return string LaunchTime
     */
    public function getLaunchTime() 
    {
        return $this->_fields['LaunchTime']['FieldValue'];
    }

    /**
     * Sets the value of the LaunchTime property.
     * 
     * @param string LaunchTime
     * @return this instance
     */
    public function setLaunchTime($value) 
    {
        $this->_fields['LaunchTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the LaunchTime and returns this instance
     * 
     * @param string $value LaunchTime
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withLaunchTime($value)
    {
        $this->setLaunchTime($value);
        return $this;
    }


    /**
     * Checks if LaunchTime is set
     * 
     * @return bool true if LaunchTime  is set
     */
    public function isSetLaunchTime()
    {
        return !is_null($this->_fields['LaunchTime']['FieldValue']);
    }

    /**
     * Gets the value of the Placement.
     * 
     * @return Placement Placement
     */
    public function getPlacement() 
    {
        return $this->_fields['Placement']['FieldValue'];
    }

    /**
     * Sets the value of the Placement.
     * 
     * @param Placement Placement
     * @return void
     */
    public function setPlacement($value) 
    {
        $this->_fields['Placement']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Placement  and returns this instance
     * 
     * @param Placement $value Placement
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withPlacement($value)
    {
        $this->setPlacement($value);
        return $this;
    }


    /**
     * Checks if Placement  is set
     * 
     * @return bool true if Placement property is set
     */
    public function isSetPlacement()
    {
        return !is_null($this->_fields['Placement']['FieldValue']);

    }

    /**
     * Gets the value of the KernelId property.
     * 
     * @return string KernelId
     */
    public function getKernelId() 
    {
        return $this->_fields['KernelId']['FieldValue'];
    }

    /**
     * Sets the value of the KernelId property.
     * 
     * @param string KernelId
     * @return this instance
     */
    public function setKernelId($value) 
    {
        $this->_fields['KernelId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the KernelId and returns this instance
     * 
     * @param string $value KernelId
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withKernelId($value)
    {
        $this->setKernelId($value);
        return $this;
    }


    /**
     * Checks if KernelId is set
     * 
     * @return bool true if KernelId  is set
     */
    public function isSetKernelId()
    {
        return !is_null($this->_fields['KernelId']['FieldValue']);
    }

    /**
     * Gets the value of the RamdiskId property.
     * 
     * @return string RamdiskId
     */
    public function getRamdiskId() 
    {
        return $this->_fields['RamdiskId']['FieldValue'];
    }

    /**
     * Sets the value of the RamdiskId property.
     * 
     * @param string RamdiskId
     * @return this instance
     */
    public function setRamdiskId($value) 
    {
        $this->_fields['RamdiskId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the RamdiskId and returns this instance
     * 
     * @param string $value RamdiskId
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withRamdiskId($value)
    {
        $this->setRamdiskId($value);
        return $this;
    }


    /**
     * Checks if RamdiskId is set
     * 
     * @return bool true if RamdiskId  is set
     */
    public function isSetRamdiskId()
    {
        return !is_null($this->_fields['RamdiskId']['FieldValue']);
    }

    /**
     * Gets the value of the Platform property.
     * 
     * @return string Platform
     */
    public function getPlatform() 
    {
        return $this->_fields['Platform']['FieldValue'];
    }

    /**
     * Sets the value of the Platform property.
     * 
     * @param string Platform
     * @return this instance
     */
    public function setPlatform($value) 
    {
        $this->_fields['Platform']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Platform and returns this instance
     * 
     * @param string $value Platform
     * @return Amazon_EC2_Model_RunningInstance instance
     */
    public function withPlatform($value)
    {
        $this->setPlatform($value);
        return $this;
    }


    /**
     * Checks if Platform is set
     * 
     * @return bool true if Platform  is set
     */
    public function isSetPlatform()
    {
        return !is_null($this->_fields['Platform']['FieldValue']);
    }




}