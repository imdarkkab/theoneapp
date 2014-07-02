<?php

/**
 * This is the model class for table "customer_device".
 *
 * The followings are the available columns in table 'customer_device':
 * @property integer $customer_device_id
 * @property integer $customer_id
 * @property integer $platform_version_id
 * @property integer $device_id
 * @property string $uuid
 * @property string $created_at
 * @property string $last_accessed_at
 * @property string $user_agent
 * @property string $push_token
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Device $device
 * @property PlatformVersion $platformVersion
 */
class CustomerDevice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, platform_version_id, device_id', 'numerical', 'integerOnly'=>true),
			array('uuid', 'length', 'max'=>512),
			array('user_agent', 'length', 'max'=>1024),
			array('push_token', 'length', 'max'=>2048),
			array('created_at, last_accessed_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('customer_device_id, customer_id, platform_version_id, device_id, uuid, created_at, last_accessed_at, user_agent, push_token', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'device' => array(self::BELONGS_TO, 'Device', 'device_id'),
			'platformVersion' => array(self::BELONGS_TO, 'PlatformVersion', 'platform_version_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_device_id' => 'Customer Device',
			'customer_id' => 'Customer',
			'platform_version_id' => 'Platform Version',
			'device_id' => 'Device',
			'uuid' => 'Uuid',
			'created_at' => 'Created At',
			'last_accessed_at' => 'Last Accessed At',
			'user_agent' => 'User Agent',
			'push_token' => 'Push Token',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('customer_device_id',$this->customer_device_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('platform_version_id',$this->platform_version_id);
		$criteria->compare('device_id',$this->device_id);
		$criteria->compare('uuid',$this->uuid,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_accessed_at',$this->last_accessed_at,true);
		$criteria->compare('user_agent',$this->user_agent,true);
		$criteria->compare('push_token',$this->push_token,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerDevice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
