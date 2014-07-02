<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property string $email
 * @property string $created_at
 * @property string $name
 * @property integer $reference_id
 * @property integer $is_registered
 * @property integer $is_active
 * @property string $password
 * @property string $dob
 * @property string $gender
 * @property string $phone_no
 * @property integer $application_id
 * @property string $picture
 * @property string $push_token
 *
 * The followings are the available model relations:
 * @property Contact[] $contacts
 * @property CustomerDevice[] $customerDevices
 * @property CustomerFacebook[] $customerFacebooks
 * @property CustomerScoreTransaction[] $customerScoreTransactions
 * @property Inbox[] $inboxes
 * @property NotifyRecipient[] $notifyRecipients
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, created_at', 'required'),
			array('reference_id, is_registered, is_active, application_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>256),
			array('name, picture, push_token', 'length', 'max'=>512),
			array('password', 'length', 'max'=>64),
			array('gender', 'length', 'max'=>8),
			array('phone_no', 'length', 'max'=>16),
			array('dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('customer_id, email, created_at, name, reference_id, is_registered, is_active, password, dob, gender, phone_no, application_id, picture, push_token', 'safe', 'on'=>'search'),
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
			'contacts' => array(self::HAS_MANY, 'Contact', 'customer_id'),
			'customerDevices' => array(self::HAS_MANY, 'CustomerDevice', 'customer_id'),
			'customerFacebooks' => array(self::HAS_MANY, 'CustomerFacebook', 'customer_id'),
			'customerScoreTransactions' => array(self::HAS_MANY, 'CustomerScoreTransaction', 'customer_id'),
			'inboxes' => array(self::HAS_MANY, 'Inbox', 'customer_id'),
			'notifyRecipients' => array(self::HAS_MANY, 'NotifyRecipient', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_id' => 'Customer',
			'email' => 'Email',
			'created_at' => 'Created At',
			'name' => 'Name',
			'reference_id' => 'Reference',
			'is_registered' => 'Is Registered',
			'is_active' => 'Is Active',
			'password' => 'Password',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'phone_no' => 'Phone No',
			'application_id' => 'Application',
			'picture' => 'Picture',
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

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('reference_id',$this->reference_id);
		$criteria->compare('is_registered',$this->is_registered);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('push_token',$this->push_token,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
