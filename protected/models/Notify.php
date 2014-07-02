<?php

/**
 * This is the model class for table "notify".
 *
 * The followings are the available columns in table 'notify':
 * @property integer $notify_id
 * @property string $created_at
 * @property string $send_at
 * @property integer $recipient_id
 * @property integer $notify_type_id
 * @property string $topic
 * @property string $message
 * @property integer $status
 */
class Notify extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notify';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('send_at, recipient_id', 'required'),
			array('recipient_id, notify_type_id, status', 'numerical', 'integerOnly'=>true),
			array('topic', 'length', 'max'=>128),
			array('message', 'length', 'max'=>1024),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('notify_id, created_at, send_at, recipient_id, notify_type_id, topic, message, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'notify_id' => 'Notify',
			'created_at' => 'Created At',
			'send_at' => 'Send At',
			'recipient_id' => 'Recipient',
			'notify_type_id' => 'Notify Type',
			'topic' => 'Topic',
			'message' => 'Message',
			'status' => 'Status',
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

		$criteria->compare('notify_id',$this->notify_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('send_at',$this->send_at,true);
		$criteria->compare('recipient_id',$this->recipient_id);
		$criteria->compare('notify_type_id',$this->notify_type_id);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notify the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
