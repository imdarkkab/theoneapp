<?php

/**
 * This is the model class for table "platform".
 *
 * The followings are the available columns in table 'platform':
 * @property integer $platform_id
 * @property string $platform_name
 * @property string $display_name
 * @property string $push_exec_class
 *
 * The followings are the available model relations:
 * @property NotifyRecipient[] $notifyRecipients
 * @property PlatformVersion[] $platformVersions
 */
class Platform extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'platform';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('platform_name, display_name', 'length', 'max'=>40),
			array('push_exec_class', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('platform_id, platform_name, display_name, push_exec_class', 'safe', 'on'=>'search'),
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
			'notifyRecipients' => array(self::HAS_MANY, 'NotifyRecipient', 'platform_id'),
			'platformVersions' => array(self::HAS_MANY, 'PlatformVersion', 'platform_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'platform_id' => 'Platform',
			'platform_name' => 'Platform Name',
			'display_name' => 'Display Name',
			'push_exec_class' => 'Push Exec Class',
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

		$criteria->compare('platform_id',$this->platform_id);
		$criteria->compare('platform_name',$this->platform_name,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('push_exec_class',$this->push_exec_class,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Platform the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
