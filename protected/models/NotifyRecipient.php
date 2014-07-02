<?php

/**
 * This is the model class for table "notify_recipient".
 *
 * The followings are the available columns in table 'notify_recipient':
 * @property integer $recipient_id
 * @property integer $platform_id
 * @property integer $customer_id
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Platform $platform
 */
class NotifyRecipient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notify_recipient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('platform_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('recipient_id, platform_id, customer_id, created_at', 'safe', 'on'=>'search'),
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
			'platform' => array(self::BELONGS_TO, 'Platform', 'platform_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'recipient_id' => 'Recipient',
			'platform_id' => 'Platform',
			'customer_id' => 'Customer',
			'created_at' => 'Created At',
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

		$criteria->compare('recipient_id',$this->recipient_id);
		$criteria->compare('platform_id',$this->platform_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotifyRecipient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
