<?php

/**
 * This is the model class for table "inbox".
 *
 * The followings are the available columns in table 'inbox':
 * @property integer $inbox_id
 * @property integer $customer_id
 * @property string $subject
 * @property string $body
 * @property string $created_at
 * @property integer $inbox_type_id
 * @property integer $is_read
 * @property string $read_at
 * @property integer $is_delete
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property InboxType $inboxType
 * @property InboxItem[] $inboxItems
 */
class Inbox extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, is_read', 'required'),
			array('customer_id, inbox_type_id, is_read, is_delete', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>128),
			array('body', 'length', 'max'=>4096),
			array('image', 'length', 'max'=>512),
			array('created_at, read_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('inbox_id, customer_id, subject, body, created_at, inbox_type_id, is_read, read_at, is_delete, image', 'safe', 'on'=>'search'),
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
			'inboxType' => array(self::BELONGS_TO, 'InboxType', 'inbox_type_id'),
			'inboxItems' => array(self::HAS_MANY, 'InboxItem', 'inbox_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'inbox_id' => 'Inbox',
			'customer_id' => 'Customer',
			'subject' => 'Subject',
			'body' => 'Body',
			'created_at' => 'Created At',
			'inbox_type_id' => 'Inbox Type',
			'is_read' => 'Is Read',
			'read_at' => 'Read At',
			'is_delete' => 'Is Delete',
			'image' => 'Image',
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

		$criteria->compare('inbox_id',$this->inbox_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('inbox_type_id',$this->inbox_type_id);
		$criteria->compare('is_read',$this->is_read);
		$criteria->compare('read_at',$this->read_at,true);
		$criteria->compare('is_delete',$this->is_delete);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
