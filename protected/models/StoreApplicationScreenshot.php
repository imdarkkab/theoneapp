<?php

/**
 * This is the model class for table "store_application_screenshot".
 *
 * The followings are the available columns in table 'store_application_screenshot':
 * @property integer $screenshot_id
 * @property string $app_id
 * @property string $screenshot
 * @property integer $seq
 */
class StoreApplicationScreenshot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_application_screenshot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seq', 'numerical', 'integerOnly'=>true),
			array('app_id', 'length', 'max'=>64),
			array('screenshot', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('screenshot_id, app_id, screenshot, seq', 'safe', 'on'=>'search'),
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
			'screenshot_id' => 'Screenshot',
			'app_id' => 'App',
			'screenshot' => 'Screenshot',
			'seq' => 'Seq',
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

		$criteria->compare('screenshot_id',$this->screenshot_id);
		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('screenshot',$this->screenshot,true);
		$criteria->compare('seq',$this->seq);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreApplicationScreenshot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
