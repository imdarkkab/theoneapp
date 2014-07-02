<?php

/**
 * This is the model class for table "customer_facebook".
 *
 * The followings are the available columns in table 'customer_facebook':
 * @property integer $customer_fb_id
 * @property integer $customer_id
 * @property string $fb_id
 * @property string $name
 * @property string $nick_name
 * @property string $email
 * @property string $picture
 * @property string $created_at
 * @property string $last_updated_at
 * @property string $token
 *
 * The followings are the available model relations:
 * @property Customer $customer
 */
class CustomerFacebook extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_facebook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id', 'numerical', 'integerOnly'=>true),
			array('fb_id, name, picture, token', 'length', 'max'=>512),
			array('nick_name', 'length', 'max'=>256),
			array('email', 'length', 'max'=>40),
			array('created_at, last_updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('customer_fb_id, customer_id, fb_id, name, nick_name, email, picture, created_at, last_updated_at, token', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_fb_id' => 'Customer Fb',
			'customer_id' => 'Customer',
			'fb_id' => 'Fb',
			'name' => 'Name',
			'nick_name' => 'Nick Name',
			'email' => 'Email',
			'picture' => 'Picture',
			'created_at' => 'Created At',
			'last_updated_at' => 'Last Updated At',
			'token' => 'Token',
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

		$criteria->compare('customer_fb_id',$this->customer_fb_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('fb_id',$this->fb_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_updated_at',$this->last_updated_at,true);
		$criteria->compare('token',$this->token,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerFacebook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
