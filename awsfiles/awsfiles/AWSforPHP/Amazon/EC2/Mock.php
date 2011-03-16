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
 *  @see Amazon_EC2_Interface
 */
require_once ('Amazon/EC2/Interface.php'); 

/**
 * The Amazon Elastic Compute Cloud (Amazon EC2) web service provides you with
 * the ability to execute your applications in Amazon's computing environment.
 * To use Amazon EC2 you simply:
 * 1. Create an Amazon Machine Image (AMI) containing all your software, including
 * your operating system and associated configuration settings, applications,
 * libraries, etc. Think of this as zipping up the contents of your hard drive. We
 * provide all the necessary tools to create and package your AMI.
 * 2. Upload this AMI to the Amazon S3 (Amazon Simple Storage Service) service. This
 * gives us reliable, secure access to your AMI.
 * 3. Register your AMI with Amazon EC2. This allows us to verify that your AMI has
 * been uploaded correctly and to allocate a unique identifier for it.
 * 4. Use this AMI ID and the Amazon EC2 web service APIs to run, monitor, and
 * terminate as many instances of this AMI as required.
 * You can also skip the first three steps and choose to launch an AMI that is
 * provided by Amazon or shared by another user.
 * While instances are running, you are billed for the computing and network
 * resources that they consume.
 * You can also skip the first three steps and choose to launch an AMI that is
 * provided by Amazon or shared by another user.
 * While instances are running, you are billed for the computing and network
 * resources that they consume.
 * 
 */
class  Amazon_EC2_Mock implements Amazon_EC2_Interface
{
    // Public API ------------------------------------------------------------//

            
    /**
     * Allocate Address 
     * The AllocateAddress operation acquires an elastic IP address for use with your
     * account.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-AllocateAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AllocateAddress request or Amazon_EC2_Model_AllocateAddress object itself
     * @see Amazon_EC2_Model_AllocateAddress
     * @return Amazon_EC2_Model_AllocateAddressResponse Amazon_EC2_Model_AllocateAddressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function allocateAddress($request) 
    {
        require_once ('Amazon/EC2/Model/AllocateAddressResponse.php');
        return Amazon_EC2_Model_AllocateAddressResponse::fromXML($this->_invoke('AllocateAddress'));
    }


            
    /**
     * Associate Address 
     * The AssociateAddress operation associates an elastic IP address with an
     * instance.
     * If the IP address is currently assigned to another instance, the IP address is
     * assigned to the new instance. This is an idempotent operation. If you enter it
     * more than once, Amazon EC2 does not return an error.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-AssociateAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AssociateAddress request or Amazon_EC2_Model_AssociateAddress object itself
     * @see Amazon_EC2_Model_AssociateAddress
     * @return Amazon_EC2_Model_AssociateAddressResponse Amazon_EC2_Model_AssociateAddressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function associateAddress($request) 
    {
        require_once ('Amazon/EC2/Model/AssociateAddressResponse.php');
        return Amazon_EC2_Model_AssociateAddressResponse::fromXML($this->_invoke('AssociateAddress'));
    }


            
    /**
     * Attach Volume 
     * Attach a previously created volume to a running instance.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-AttachVolume.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AttachVolume request or Amazon_EC2_Model_AttachVolume object itself
     * @see Amazon_EC2_Model_AttachVolume
     * @return Amazon_EC2_Model_AttachVolumeResponse Amazon_EC2_Model_AttachVolumeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function attachVolume($request) 
    {
        require_once ('Amazon/EC2/Model/AttachVolumeResponse.php');
        return Amazon_EC2_Model_AttachVolumeResponse::fromXML($this->_invoke('AttachVolume'));
    }


            
    /**
     * Authorize Security Group Ingress 
     * The AuthorizeSecurityGroupIngress operation adds permissions to a security
     * group.
     * Permissions are specified by the IP protocol (TCP, UDP or ICMP), the source of
     * the request (by IP range or an Amazon EC2 user-group pair), the source and
     * destination port ranges (for TCP and UDP), and the ICMP codes and types (for
     * ICMP). When authorizing ICMP, -1 can be used as a wildcard in the type and code
     * fields.
     * Permission changes are propagated to instances within the security group as
     * quickly as possible. However, depending on the number of instances, a small
     * delay might occur.
     * When authorizing a user/group pair permission, GroupName,
     * SourceSecurityGroupName and SourceSecurityGroupOwnerId must be specified. When
     * authorizing a CIDR IP permission, GroupName, IpProtocol, FromPort, ToPort and
     * CidrIp must be specified. Mixing these two types of parameters is not allowed.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-AuthorizeSecurityGroupIngress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AuthorizeSecurityGroupIngress request or Amazon_EC2_Model_AuthorizeSecurityGroupIngress object itself
     * @see Amazon_EC2_Model_AuthorizeSecurityGroupIngress
     * @return Amazon_EC2_Model_AuthorizeSecurityGroupIngressResponse Amazon_EC2_Model_AuthorizeSecurityGroupIngressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function authorizeSecurityGroupIngress($request) 
    {
        require_once ('Amazon/EC2/Model/AuthorizeSecurityGroupIngressResponse.php');
        return Amazon_EC2_Model_AuthorizeSecurityGroupIngressResponse::fromXML($this->_invoke('AuthorizeSecurityGroupIngress'));
    }


            
    /**
     * Bundle Instance 
     * The BundleInstance operation request that an instance is bundled the next time it boots.
     * The bundling process creates a new image from a running instance and stores
     * the AMI data in S3. Once bundled, the image must be registered in the normal
     * way using the RegisterImage API.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-BundleInstance.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_BundleInstance request or Amazon_EC2_Model_BundleInstance object itself
     * @see Amazon_EC2_Model_BundleInstance
     * @return Amazon_EC2_Model_BundleInstanceResponse Amazon_EC2_Model_BundleInstanceResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function bundleInstance($request) 
    {
        require_once ('Amazon/EC2/Model/BundleInstanceResponse.php');
        return Amazon_EC2_Model_BundleInstanceResponse::fromXML($this->_invoke('BundleInstance'));
    }


            
    /**
     * Cancel Bundle Task 
     * CancelBundleTask operation cancels a pending or
     * in-progress bundling task. This is an asynchronous
     * call and it make take a while for the task to be cancelled.
     * If a task is cancelled while it is storing items,
     * there may be parts of the incomplete AMI stored in S3.
     * It is up to the caller to clean up these parts from S3.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-CancelBundleTask.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_CancelBundleTask request or Amazon_EC2_Model_CancelBundleTask object itself
     * @see Amazon_EC2_Model_CancelBundleTask
     * @return Amazon_EC2_Model_CancelBundleTaskResponse Amazon_EC2_Model_CancelBundleTaskResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function cancelBundleTask($request) 
    {
        require_once ('Amazon/EC2/Model/CancelBundleTaskResponse.php');
        return Amazon_EC2_Model_CancelBundleTaskResponse::fromXML($this->_invoke('CancelBundleTask'));
    }


            
    /**
     * Confirm Product Instance 
     * The ConfirmProductInstance operation returns true if the specified product code
     * is attached to the specified instance. The operation returns false if the
     * product code is not attached to the instance.
     * The ConfirmProductInstance operation can only be executed by the owner of the
     * AMI. This feature is useful when an AMI owner is providing support and wants to
     * verify whether a user's instance is eligible.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-ConfirmProductInstance.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_ConfirmProductInstance request or Amazon_EC2_Model_ConfirmProductInstance object itself
     * @see Amazon_EC2_Model_ConfirmProductInstance
     * @return Amazon_EC2_Model_ConfirmProductInstanceResponse Amazon_EC2_Model_ConfirmProductInstanceResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function confirmProductInstance($request) 
    {
        require_once ('Amazon/EC2/Model/ConfirmProductInstanceResponse.php');
        return Amazon_EC2_Model_ConfirmProductInstanceResponse::fromXML($this->_invoke('ConfirmProductInstance'));
    }


            
    /**
     * Create Key Pair 
     * The CreateKeyPair operation creates a new 2048 bit RSA key pair and returns a
     * unique ID that can be used to reference this key pair when launching new
     * instances. For more information, see RunInstances.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-CreateKeyPair.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_CreateKeyPair request or Amazon_EC2_Model_CreateKeyPair object itself
     * @see Amazon_EC2_Model_CreateKeyPair
     * @return Amazon_EC2_Model_CreateKeyPairResponse Amazon_EC2_Model_CreateKeyPairResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function createKeyPair($request) 
    {
        require_once ('Amazon/EC2/Model/CreateKeyPairResponse.php');
        return Amazon_EC2_Model_CreateKeyPairResponse::fromXML($this->_invoke('CreateKeyPair'));
    }


            
    /**
     * Create Security Group 
     * The CreateSecurityGroup operation creates a new security group.
     * Every instance is launched in a security group. If no security group is
     * specified during launch, the instances are launched in the default security
     * group. Instances within the same security group have unrestricted network
     * access to each other. Instances will reject network access attempts from other
     * instances in a different security group. As the owner of instances you can
     * grant or revoke specific permissions using the AuthorizeSecurityGroupIngress
     * and RevokeSecurityGroupIngress operations.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-CreateSecurityGroup.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_CreateSecurityGroup request or Amazon_EC2_Model_CreateSecurityGroup object itself
     * @see Amazon_EC2_Model_CreateSecurityGroup
     * @return Amazon_EC2_Model_CreateSecurityGroupResponse Amazon_EC2_Model_CreateSecurityGroupResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function createSecurityGroup($request) 
    {
        require_once ('Amazon/EC2/Model/CreateSecurityGroupResponse.php');
        return Amazon_EC2_Model_CreateSecurityGroupResponse::fromXML($this->_invoke('CreateSecurityGroup'));
    }


            
    /**
     * Create Snapshot 
     * Create a snapshot of the volume identified by volume ID. A volume does not have to be detached
     * at the time the snapshot is taken.
     * Important Note:
     * Snapshot creation requires that the system is in a consistent state.
     * For instance, this means that if taking a snapshot of a database, the tables must
     * be read-only locked to ensure that the snapshot will not contain a corrupted
     * version of the database.  Therefore, be careful when using this API to ensure that
     * the system remains in the consistent state until the create snapshot status
     * has returned.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-CreateSnapshot.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_CreateSnapshot request or Amazon_EC2_Model_CreateSnapshot object itself
     * @see Amazon_EC2_Model_CreateSnapshot
     * @return Amazon_EC2_Model_CreateSnapshotResponse Amazon_EC2_Model_CreateSnapshotResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function createSnapshot($request) 
    {
        require_once ('Amazon/EC2/Model/CreateSnapshotResponse.php');
        return Amazon_EC2_Model_CreateSnapshotResponse::fromXML($this->_invoke('CreateSnapshot'));
    }


            
    /**
     * Create Volume 
     * Initializes an empty volume of a given size
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-CreateVolume.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_CreateVolume request or Amazon_EC2_Model_CreateVolume object itself
     * @see Amazon_EC2_Model_CreateVolume
     * @return Amazon_EC2_Model_CreateVolumeResponse Amazon_EC2_Model_CreateVolumeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function createVolume($request) 
    {
        require_once ('Amazon/EC2/Model/CreateVolumeResponse.php');
        return Amazon_EC2_Model_CreateVolumeResponse::fromXML($this->_invoke('CreateVolume'));
    }


            
    /**
     * Delete Key Pair 
     * The DeleteKeyPair operation deletes a key pair.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DeleteKeyPair.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DeleteKeyPair request or Amazon_EC2_Model_DeleteKeyPair object itself
     * @see Amazon_EC2_Model_DeleteKeyPair
     * @return Amazon_EC2_Model_DeleteKeyPairResponse Amazon_EC2_Model_DeleteKeyPairResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function deleteKeyPair($request) 
    {
        require_once ('Amazon/EC2/Model/DeleteKeyPairResponse.php');
        return Amazon_EC2_Model_DeleteKeyPairResponse::fromXML($this->_invoke('DeleteKeyPair'));
    }


            
    /**
     * Delete Security Group 
     * The DeleteSecurityGroup operation deletes a security group.
     * Note:
     * If you attempt to delete a security group that contains instances, a fault is
     * returned.
     * If you attempt to delete a security group that is referenced by another
     * security group, a fault is returned. For example, if security group B has a
     * rule that allows access from security group A, security group A cannot be
     * deleted until the allow rule is removed.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DeleteSecurityGroup.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DeleteSecurityGroup request or Amazon_EC2_Model_DeleteSecurityGroup object itself
     * @see Amazon_EC2_Model_DeleteSecurityGroup
     * @return Amazon_EC2_Model_DeleteSecurityGroupResponse Amazon_EC2_Model_DeleteSecurityGroupResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function deleteSecurityGroup($request) 
    {
        require_once ('Amazon/EC2/Model/DeleteSecurityGroupResponse.php');
        return Amazon_EC2_Model_DeleteSecurityGroupResponse::fromXML($this->_invoke('DeleteSecurityGroup'));
    }


            
    /**
     * Delete Snapshot 
     * Deletes the snapshot identitied by snapshotId.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DeleteSnapshot.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DeleteSnapshot request or Amazon_EC2_Model_DeleteSnapshot object itself
     * @see Amazon_EC2_Model_DeleteSnapshot
     * @return Amazon_EC2_Model_DeleteSnapshotResponse Amazon_EC2_Model_DeleteSnapshotResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function deleteSnapshot($request) 
    {
        require_once ('Amazon/EC2/Model/DeleteSnapshotResponse.php');
        return Amazon_EC2_Model_DeleteSnapshotResponse::fromXML($this->_invoke('DeleteSnapshot'));
    }


            
    /**
     * Delete Volume 
     * Deletes a  previously created volume. Once successfully deleted, a new volume  can be created with the same name.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DeleteVolume.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DeleteVolume request or Amazon_EC2_Model_DeleteVolume object itself
     * @see Amazon_EC2_Model_DeleteVolume
     * @return Amazon_EC2_Model_DeleteVolumeResponse Amazon_EC2_Model_DeleteVolumeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function deleteVolume($request) 
    {
        require_once ('Amazon/EC2/Model/DeleteVolumeResponse.php');
        return Amazon_EC2_Model_DeleteVolumeResponse::fromXML($this->_invoke('DeleteVolume'));
    }


            
    /**
     * Deregister Image 
     * The DeregisterImage operation deregisters an AMI. Once deregistered, instances
     * of the AMI can no longer be launched.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DeregisterImage.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DeregisterImage request or Amazon_EC2_Model_DeregisterImage object itself
     * @see Amazon_EC2_Model_DeregisterImage
     * @return Amazon_EC2_Model_DeregisterImageResponse Amazon_EC2_Model_DeregisterImageResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function deregisterImage($request) 
    {
        require_once ('Amazon/EC2/Model/DeregisterImageResponse.php');
        return Amazon_EC2_Model_DeregisterImageResponse::fromXML($this->_invoke('DeregisterImage'));
    }


            
    /**
     * Describe Addresses 
     * The DescribeAddresses operation lists elastic IP addresses assigned to your
     * account.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeAddresses.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeAddresses request or Amazon_EC2_Model_DescribeAddresses object itself
     * @see Amazon_EC2_Model_DescribeAddresses
     * @return Amazon_EC2_Model_DescribeAddressesResponse Amazon_EC2_Model_DescribeAddressesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeAddresses($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeAddressesResponse.php');
        return Amazon_EC2_Model_DescribeAddressesResponse::fromXML($this->_invoke('DescribeAddresses'));
    }


            
    /**
     * Describe Availability Zones 
     * The DescribeAvailabilityZones operation describes availability zones that are
     * currently available to the account and their states.
     * Availability zones are not the same across accounts. The availability zone
     * us-east-1a for account A is not necessarily the same as us-east-1a for account
     * B. Zone assignments are mapped independently for each account.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeAvailabilityZones.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeAvailabilityZones request or Amazon_EC2_Model_DescribeAvailabilityZones object itself
     * @see Amazon_EC2_Model_DescribeAvailabilityZones
     * @return Amazon_EC2_Model_DescribeAvailabilityZonesResponse Amazon_EC2_Model_DescribeAvailabilityZonesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeAvailabilityZones($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeAvailabilityZonesResponse.php');
        return Amazon_EC2_Model_DescribeAvailabilityZonesResponse::fromXML($this->_invoke('DescribeAvailabilityZones'));
    }


            
    /**
     * Describe Bundle Tasks 
     * The DescribeBundleTasks operation describes in-progress
     * and recent bundle tasks. Complete and failed tasks are
     * removed from the list a short time after completion.
     * If no bundle ids are given, all bundle tasks are returned.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeBundleTasks.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeBundleTasks request or Amazon_EC2_Model_DescribeBundleTasks object itself
     * @see Amazon_EC2_Model_DescribeBundleTasks
     * @return Amazon_EC2_Model_DescribeBundleTasksResponse Amazon_EC2_Model_DescribeBundleTasksResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeBundleTasks($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeBundleTasksResponse.php');
        return Amazon_EC2_Model_DescribeBundleTasksResponse::fromXML($this->_invoke('DescribeBundleTasks'));
    }


            
    /**
     * Describe Image Attribute 
     * The DescribeImageAttribute operation returns information about an attribute of
     * an AMI. Only one attribute can be specified per call.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeImageAttribute.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeImageAttribute request or Amazon_EC2_Model_DescribeImageAttribute object itself
     * @see Amazon_EC2_Model_DescribeImageAttribute
     * @return Amazon_EC2_Model_DescribeImageAttributeResponse Amazon_EC2_Model_DescribeImageAttributeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeImageAttribute($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeImageAttributeResponse.php');
        return Amazon_EC2_Model_DescribeImageAttributeResponse::fromXML($this->_invoke('DescribeImageAttribute'));
    }


            
    /**
     * Describe Images 
     * The DescribeImages operation returns information about AMIs, AKIs, and ARIs
     * available to the user. Information returned includes image type, product codes,
     * architecture, and kernel and RAM disk IDs. Images available to the user include
     * public images available for any user to launch, private images owned by the
     * user making the request, and private images owned by other users for which the
     * user has explicit launch permissions.
     * Launch permissions fall into three categories:
     * Public:
     * The owner of the AMI granted launch permissions for the AMI to the all group.
     * All users have launch permissions for these AMIs.
     * Explicit:
     * The owner of the AMI granted launch permissions to a specific user.
     * Implicit:
     * A user has implicit launch permissions for all AMIs he or she owns.
     * The list of AMIs returned can be modified by specifying AMI IDs, AMI owners, or
     * users with launch permissions. If no options are specified, Amazon EC2 returns
     * all AMIs for which the user has launch permissions.
     * If you specify one or more AMI IDs, only AMIs that have the specified IDs are
     * returned. If you specify an invalid AMI ID, a fault is returned. If you specify
     * an AMI ID for which you do not have access, it will not be included in the
     * returned results.
     * If you specify one or more AMI owners, only AMIs from the specified owners and
     * for which you have access are returned. The results can include the account IDs
     * of the specified owners, amazon for AMIs owned by Amazon or self for AMIs that
     * you own.
     * If you specify a list of executable users, only users that have launch
     * permissions for the AMIs are returned. You can specify account IDs (if you own
     * the AMI(s)), self for AMIs for which you own or have explicit permissions, or
     * all for public AMIs.
     * Note:
     * Deregistered images are included in the returned results for an unspecified
     * interval after deregistration.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeImages.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeImages request or Amazon_EC2_Model_DescribeImages object itself
     * @see Amazon_EC2_Model_DescribeImages
     * @return Amazon_EC2_Model_DescribeImagesResponse Amazon_EC2_Model_DescribeImagesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeImages($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeImagesResponse.php');
        return Amazon_EC2_Model_DescribeImagesResponse::fromXML($this->_invoke('DescribeImages'));
    }


            
    /**
     * Describe Instances 
     * The DescribeInstances operation returns information about instances that you
     * own.
     * If you specify one or more instance IDs, Amazon EC2 returns information for
     * those instances. If you do not specify instance IDs, Amazon EC2 returns
     * information for all relevant instances. If you specify an invalid instance ID,
     * a fault is returned. If you specify an instance that you do not own, it will
     * not be included in the returned results.
     * Recently terminated instances might appear in the returned results. This
     * interval is usually less than one hour.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeInstances.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeInstances request or Amazon_EC2_Model_DescribeInstances object itself
     * @see Amazon_EC2_Model_DescribeInstances
     * @return Amazon_EC2_Model_DescribeInstancesResponse Amazon_EC2_Model_DescribeInstancesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeInstances($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeInstancesResponse.php');
        return Amazon_EC2_Model_DescribeInstancesResponse::fromXML($this->_invoke('DescribeInstances'));
    }


            
    /**
     * Describe Regions 
     * The DescribeRegions operation describes regions zones that are currently available to the account.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeRegions.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeRegions request or Amazon_EC2_Model_DescribeRegions object itself
     * @see Amazon_EC2_Model_DescribeRegions
     * @return Amazon_EC2_Model_DescribeRegionsResponse Amazon_EC2_Model_DescribeRegionsResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeRegions($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeRegionsResponse.php');
        return Amazon_EC2_Model_DescribeRegionsResponse::fromXML($this->_invoke('DescribeRegions'));
    }


            
    /**
     * Describe Reserved Instances 
     * The DescribeReservedInstances operation describes Reserved Instances that were purchased for use with your account.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeReservedInstances.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeReservedInstances request or Amazon_EC2_Model_DescribeReservedInstances object itself
     * @see Amazon_EC2_Model_DescribeReservedInstances
     * @return Amazon_EC2_Model_DescribeReservedInstancesResponse Amazon_EC2_Model_DescribeReservedInstancesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeReservedInstances($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeReservedInstancesResponse.php');
        return Amazon_EC2_Model_DescribeReservedInstancesResponse::fromXML($this->_invoke('DescribeReservedInstances'));
    }


            
    /**
     * Describe Reserved Instances Offerings 
     * The DescribeReservedInstancesOfferings operation describes Reserved
     * Instance offerings that are available for purchase. With Amazon EC2
     * Reserved Instances, you purchase the right to launch Amazon EC2 instances
     * for a period of time (without getting insufficient capacity errors) and
     * pay a lower usage rate for the actual time used.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeReservedInstancesOfferings.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeReservedInstancesOfferings request or Amazon_EC2_Model_DescribeReservedInstancesOfferings object itself
     * @see Amazon_EC2_Model_DescribeReservedInstancesOfferings
     * @return Amazon_EC2_Model_DescribeReservedInstancesOfferingsResponse Amazon_EC2_Model_DescribeReservedInstancesOfferingsResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeReservedInstancesOfferings($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeReservedInstancesOfferingsResponse.php');
        return Amazon_EC2_Model_DescribeReservedInstancesOfferingsResponse::fromXML($this->_invoke('DescribeReservedInstancesOfferings'));
    }


            
    /**
     * Describe Key Pairs 
     * The DescribeKeyPairs operation returns information about key pairs available to
     * you. If you specify key pairs, information about those key pairs is returned.
     * Otherwise, information for all registered key pairs is returned.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeKeyPairs.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeKeyPairs request or Amazon_EC2_Model_DescribeKeyPairs object itself
     * @see Amazon_EC2_Model_DescribeKeyPairs
     * @return Amazon_EC2_Model_DescribeKeyPairsResponse Amazon_EC2_Model_DescribeKeyPairsResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeKeyPairs($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeKeyPairsResponse.php');
        return Amazon_EC2_Model_DescribeKeyPairsResponse::fromXML($this->_invoke('DescribeKeyPairs'));
    }


            
    /**
     * Describe Security Groups 
     * The DescribeSecurityGroups operation returns information about security groups
     * that you own.
     * If you specify security group names, information about those security group is
     * returned. Otherwise, information for all security group is returned. If you
     * specify a group that does not exist, a fault is returned.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeSecurityGroups.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeSecurityGroups request or Amazon_EC2_Model_DescribeSecurityGroups object itself
     * @see Amazon_EC2_Model_DescribeSecurityGroups
     * @return Amazon_EC2_Model_DescribeSecurityGroupsResponse Amazon_EC2_Model_DescribeSecurityGroupsResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeSecurityGroups($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeSecurityGroupsResponse.php');
        return Amazon_EC2_Model_DescribeSecurityGroupsResponse::fromXML($this->_invoke('DescribeSecurityGroups'));
    }


            
    /**
     * Describe Snapshots 
     * Describes the indicated snapshots, or in lieu of that, all snapshots owned by the caller.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeSnapshots.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeSnapshots request or Amazon_EC2_Model_DescribeSnapshots object itself
     * @see Amazon_EC2_Model_DescribeSnapshots
     * @return Amazon_EC2_Model_DescribeSnapshotsResponse Amazon_EC2_Model_DescribeSnapshotsResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeSnapshots($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeSnapshotsResponse.php');
        return Amazon_EC2_Model_DescribeSnapshotsResponse::fromXML($this->_invoke('DescribeSnapshots'));
    }


            
    /**
     * Describe Volumes 
     * Describes the status of the indicated or, in lieu of any specified,  all volumes belonging to the caller. Volumes that have been deleted are not described.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DescribeVolumes.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DescribeVolumes request or Amazon_EC2_Model_DescribeVolumes object itself
     * @see Amazon_EC2_Model_DescribeVolumes
     * @return Amazon_EC2_Model_DescribeVolumesResponse Amazon_EC2_Model_DescribeVolumesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function describeVolumes($request) 
    {
        require_once ('Amazon/EC2/Model/DescribeVolumesResponse.php');
        return Amazon_EC2_Model_DescribeVolumesResponse::fromXML($this->_invoke('DescribeVolumes'));
    }


            
    /**
     * Detach Volume 
     * Detach a previously attached volume from a running instance.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DetachVolume.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DetachVolume request or Amazon_EC2_Model_DetachVolume object itself
     * @see Amazon_EC2_Model_DetachVolume
     * @return Amazon_EC2_Model_DetachVolumeResponse Amazon_EC2_Model_DetachVolumeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function detachVolume($request) 
    {
        require_once ('Amazon/EC2/Model/DetachVolumeResponse.php');
        return Amazon_EC2_Model_DetachVolumeResponse::fromXML($this->_invoke('DetachVolume'));
    }


            
    /**
     * Disassociate Address 
     * The DisassociateAddress operation disassociates the specified elastic IP
     * address from the instance to which it is assigned. This is an idempotent
     * operation. If you enter it more than once, Amazon EC2 does not return an error.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-DisassociateAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_DisassociateAddress request or Amazon_EC2_Model_DisassociateAddress object itself
     * @see Amazon_EC2_Model_DisassociateAddress
     * @return Amazon_EC2_Model_DisassociateAddressResponse Amazon_EC2_Model_DisassociateAddressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function disassociateAddress($request) 
    {
        require_once ('Amazon/EC2/Model/DisassociateAddressResponse.php');
        return Amazon_EC2_Model_DisassociateAddressResponse::fromXML($this->_invoke('DisassociateAddress'));
    }


            
    /**
     * Get Console Output 
     * The GetConsoleOutput operation retrieves console output for the specified
     * instance.
     * Instance console output is buffered and posted shortly after instance boot,
     * reboot, and termination. Amazon EC2 preserves the most recent 64 KB output
     * which will be available for at least one hour after the most recent post.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-GetConsoleOutput.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_GetConsoleOutput request or Amazon_EC2_Model_GetConsoleOutput object itself
     * @see Amazon_EC2_Model_GetConsoleOutput
     * @return Amazon_EC2_Model_GetConsoleOutputResponse Amazon_EC2_Model_GetConsoleOutputResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function getConsoleOutput($request) 
    {
        require_once ('Amazon/EC2/Model/GetConsoleOutputResponse.php');
        return Amazon_EC2_Model_GetConsoleOutputResponse::fromXML($this->_invoke('GetConsoleOutput'));
    }


            
    /**
     * Modify Image Attribute 
     * The ModifyImageAttribute operation modifies an attribute of an AMI.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-ModifyImageAttribute.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_ModifyImageAttribute request or Amazon_EC2_Model_ModifyImageAttribute object itself
     * @see Amazon_EC2_Model_ModifyImageAttribute
     * @return Amazon_EC2_Model_ModifyImageAttributeResponse Amazon_EC2_Model_ModifyImageAttributeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function modifyImageAttribute($request) 
    {
        require_once ('Amazon/EC2/Model/ModifyImageAttributeResponse.php');
        return Amazon_EC2_Model_ModifyImageAttributeResponse::fromXML($this->_invoke('ModifyImageAttribute'));
    }


            
    /**
     * Purchase Reserved Instances Offering 
     * The PurchaseReservedInstancesOffering operation purchases a
     * Reserved Instance for use with your account. With Amazon EC2
     * Reserved Instances, you purchase the right to launch Amazon EC2
     * instances for a period of time (without getting insufficient
     * capacity errors) and pay a lower usage rate for the
     * actual time used.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-PurchaseReservedInstancesOffering.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_PurchaseReservedInstancesOffering request or Amazon_EC2_Model_PurchaseReservedInstancesOffering object itself
     * @see Amazon_EC2_Model_PurchaseReservedInstancesOffering
     * @return Amazon_EC2_Model_PurchaseReservedInstancesOfferingResponse Amazon_EC2_Model_PurchaseReservedInstancesOfferingResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function purchaseReservedInstancesOffering($request) 
    {
        require_once ('Amazon/EC2/Model/PurchaseReservedInstancesOfferingResponse.php');
        return Amazon_EC2_Model_PurchaseReservedInstancesOfferingResponse::fromXML($this->_invoke('PurchaseReservedInstancesOffering'));
    }


            
    /**
     * Reboot Instances 
     * The RebootInstances operation requests a reboot of one or more instances. This
     * operation is asynchronous; it only queues a request to reboot the specified
     * instance(s). The operation will succeed if the instances are valid and belong
     * to the user. Requests to reboot terminated instances are ignored.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-RebootInstances.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_RebootInstances request or Amazon_EC2_Model_RebootInstances object itself
     * @see Amazon_EC2_Model_RebootInstances
     * @return Amazon_EC2_Model_RebootInstancesResponse Amazon_EC2_Model_RebootInstancesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function rebootInstances($request) 
    {
        require_once ('Amazon/EC2/Model/RebootInstancesResponse.php');
        return Amazon_EC2_Model_RebootInstancesResponse::fromXML($this->_invoke('RebootInstances'));
    }


            
    /**
     * Register Image 
     * The RegisterImage operation registers an AMI with Amazon EC2. Images must be
     * registered before they can be launched. For more information, see RunInstances.
     * Each AMI is associated with an unique ID which is provided by the Amazon EC2
     * service through the RegisterImage operation. During registration, Amazon EC2
     * retrieves the specified image manifest from Amazon S3 and verifies that the
     * image is owned by the user registering the image.
     * The image manifest is retrieved once and stored within the Amazon EC2. Any
     * modifications to an image in Amazon S3 invalidates this registration. If you
     * make changes to an image, deregister the previous image and register the new
     * image. For more information, see DeregisterImage.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-RegisterImage.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_RegisterImage request or Amazon_EC2_Model_RegisterImage object itself
     * @see Amazon_EC2_Model_RegisterImage
     * @return Amazon_EC2_Model_RegisterImageResponse Amazon_EC2_Model_RegisterImageResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function registerImage($request) 
    {
        require_once ('Amazon/EC2/Model/RegisterImageResponse.php');
        return Amazon_EC2_Model_RegisterImageResponse::fromXML($this->_invoke('RegisterImage'));
    }


            
    /**
     * Release Address 
     * The ReleaseAddress operation releases an elastic IP address associated with
     * your account.
     * Note:
     * Releasing an IP address automatically disassociates it from any instance with
     * which it is associated. For more information, see DisassociateAddress.
     * Important:
     * After releasing an elastic IP address, it is released to the IP address pool
     * and might no longer be available to your account. Make sure to update your DNS
     * records and any servers or devices that communicate with the address.
     * If you run this operation on an elastic IP address that is already released,
     * the address might be assigned to another account which will cause Amazon EC2 to
     * return an error.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-ReleaseAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_ReleaseAddress request or Amazon_EC2_Model_ReleaseAddress object itself
     * @see Amazon_EC2_Model_ReleaseAddress
     * @return Amazon_EC2_Model_ReleaseAddressResponse Amazon_EC2_Model_ReleaseAddressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function releaseAddress($request) 
    {
        require_once ('Amazon/EC2/Model/ReleaseAddressResponse.php');
        return Amazon_EC2_Model_ReleaseAddressResponse::fromXML($this->_invoke('ReleaseAddress'));
    }


            
    /**
     * Reset Image Attribute 
     * The ResetImageAttribute operation resets an attribute of an AMI to its default
     * value.
     * Note:
     * The productCodes attribute cannot be reset.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-ResetImageAttribute.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_ResetImageAttribute request or Amazon_EC2_Model_ResetImageAttribute object itself
     * @see Amazon_EC2_Model_ResetImageAttribute
     * @return Amazon_EC2_Model_ResetImageAttributeResponse Amazon_EC2_Model_ResetImageAttributeResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function resetImageAttribute($request) 
    {
        require_once ('Amazon/EC2/Model/ResetImageAttributeResponse.php');
        return Amazon_EC2_Model_ResetImageAttributeResponse::fromXML($this->_invoke('ResetImageAttribute'));
    }


            
    /**
     * Revoke Security Group Ingress 
     * The RevokeSecurityGroupIngress operation revokes permissions from a security
     * group. The permissions used to revoke must be specified using the same values
     * used to grant the permissions.
     * Permissions are specified by IP protocol (TCP, UDP, or ICMP), the source of the
     * request (by IP range or an Amazon EC2 user-group pair), the source and
     * destination port ranges (for TCP and UDP), and the ICMP codes and types (for
     * ICMP).
     * Permission changes are quickly propagated to instances within the security
     * group. However, depending on the number of instances in the group, a small
     * delay is might occur, .
     * When revoking a user/group pair permission, GroupName, SourceSecurityGroupName
     * and SourceSecurityGroupOwnerId must be specified. When authorizing a CIDR IP
     * permission, GroupName, IpProtocol, FromPort, ToPort and CidrIp must be
     * specified. Mixing these two types of parameters is not allowed.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-RevokeSecurityGroupIngress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_RevokeSecurityGroupIngress request or Amazon_EC2_Model_RevokeSecurityGroupIngress object itself
     * @see Amazon_EC2_Model_RevokeSecurityGroupIngress
     * @return Amazon_EC2_Model_RevokeSecurityGroupIngressResponse Amazon_EC2_Model_RevokeSecurityGroupIngressResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function revokeSecurityGroupIngress($request) 
    {
        require_once ('Amazon/EC2/Model/RevokeSecurityGroupIngressResponse.php');
        return Amazon_EC2_Model_RevokeSecurityGroupIngressResponse::fromXML($this->_invoke('RevokeSecurityGroupIngress'));
    }


            
    /**
     * Run Instances 
     * The RunInstances operation launches a specified number of instances.
     * If Amazon EC2 cannot launch the minimum number AMIs you request, no instances
     * launch. If there is insufficient capacity to launch the maximum number of AMIs
     * you request, Amazon EC2 launches as many as possible to satisfy the requested
     * maximum values.
     * Every instance is launched in a security group. If you do not specify a
     * security group at launch, the instances start in your default security group.
     * For more information on creating security groups, see CreateSecurityGroup.
     * An optional instance type can be specified. For information about instance
     * types, see Instance Types.
     * You can provide an optional key pair ID for each image in the launch request
     * (for more information, see CreateKeyPair). All instances that are created from
     * images that use this key pair will have access to the associated public key at
     * boot. You can use this key to provide secure access to an instance of an image
     * on a per-instance basis. Amazon EC2 public images use this feature to provide
     * secure access without passwords.
     * Important:
     * Launching public images without a key pair ID will leave them inaccessible.
     * The public key material is made available to the instance at boot time by
     * placing it in the openssh_id.pub file on a logical device that is exposed to
     * the instance as /dev/sda2 (the ephemeral store). The format of this file is
     * suitable for use as an entry within ~/.ssh/authorized_keys (the OpenSSH
     * format). This can be done at boot (e.g., as part of rc.local) allowing for
     * secure access without passwords.
     * Optional user data can be provided in the launch request. All instances that
     * collectively comprise the launch request have access to this data For more
     * information, see Instance Metadata.
     * Note:
     * If any of the AMIs have a product code attached for which the user has not
     * subscribed, the RunInstances call will fail.
     * Important:
     * We strongly recommend using the 2.6.18 Xen stock kernel with the c1.medium and
     * c1.xlarge instances. Although the default Amazon EC2 kernels will work, the new
     * kernels provide greater stability and performance for these instance types. For
     * more information about kernels, see Kernels, RAM Disks, and Block Device
     * Mappings.
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-RunInstances.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_RunInstances request or Amazon_EC2_Model_RunInstances object itself
     * @see Amazon_EC2_Model_RunInstances
     * @return Amazon_EC2_Model_RunInstancesResponse Amazon_EC2_Model_RunInstancesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function runInstances($request) 
    {
        require_once ('Amazon/EC2/Model/RunInstancesResponse.php');
        return Amazon_EC2_Model_RunInstancesResponse::fromXML($this->_invoke('RunInstances'));
    }


            
    /**
     * Terminate Instances 
     * The TerminateInstances operation shuts down one or more instances. This
     * operation is idempotent; if you terminate an instance more than once, each call
     * will succeed.
     * Terminated instances will remain visible after termination (approximately one
     * hour).
     *   
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-03-01/DeveloperGuide/ApiReference-Query-TerminateInstances.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_TerminateInstances request or Amazon_EC2_Model_TerminateInstances object itself
     * @see Amazon_EC2_Model_TerminateInstances
     * @return Amazon_EC2_Model_TerminateInstancesResponse Amazon_EC2_Model_TerminateInstancesResponse
     *
     * @throws Amazon_EC2_Exception
     */
    public function terminateInstances($request) 
    {
        require_once ('Amazon/EC2/Model/TerminateInstancesResponse.php');
        return Amazon_EC2_Model_TerminateInstancesResponse::fromXML($this->_invoke('TerminateInstances'));
    }

    // Private API ------------------------------------------------------------//

    private function _invoke($actionName)
    {
        return $xml = file_get_contents('Amazon/EC2/Mock/' . $actionName . 'Response.xml', /** search include path */ TRUE);
    }
}