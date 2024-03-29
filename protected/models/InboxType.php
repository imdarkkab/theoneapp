<?php

/**
 * This is the model class for table "inbox_type".
 *
 * The followings are the available columns in table 'inbox_type':
 * @property integer $inbox_type_id
 * @property string $inbox_type_name
 *
 * The followings are the available model relations:
 * @property Inbox[] $inboxes
 */
class InboxType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inbox_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inbox_type_id', 'required'),
			array('inbox_type_id', 'numerical', 'integerOnly'=>true),
			array('inbox_type_name', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('inbox_type_id, inbox_type_name', 'safe', 'on'=>'search'),
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
			'inboxes' => array(self::HAS_MANY, 'Inbox', 'inbox_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'inbox_type_id' => 'Inbox Type',
			'inbox_type_name' => 'Inbox Type Name',
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

		$criteria->compare('inbox_type_id',$this->inbox_type_id);
		$criteria->compare('inbox_type_name',$this->inbox_type_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InboxType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
