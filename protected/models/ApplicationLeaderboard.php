<?php

/**
 * This is the model class for table "application_leaderboard".
 *
 * The followings are the available columns in table 'application_leaderboard':
 * @property integer $application_leaderboard_id
 * @property integer $application_id
 * @property integer $leaderboard_id
 */
class ApplicationLeaderboard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application_leaderboard';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, leaderboard_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('application_leaderboard_id, application_id, leaderboard_id', 'safe', 'on'=>'search'),
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
			'application_leaderboard_id' => 'Application Leaderboard',
			'application_id' => 'Application',
			'leaderboard_id' => 'Leaderboard',
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

		$criteria->compare('application_leaderboard_id',$this->application_leaderboard_id);
		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('leaderboard_id',$this->leaderboard_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApplicationLeaderboard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
