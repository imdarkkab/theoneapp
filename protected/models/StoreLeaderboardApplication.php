<?php

/**
 * This is the model class for table "store_leaderboard_application".
 *
 * The followings are the available columns in table 'store_leaderboard_application':
 * @property integer $store_leaderboard_application_id
 * @property integer $leaderboard_id
 * @property string $app_id
 * @property integer $seq
 */
class StoreLeaderboardApplication extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_leaderboard_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leaderboard_id, app_id', 'required'),
			array('leaderboard_id, seq', 'numerical', 'integerOnly'=>true),
			array('app_id', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('store_leaderboard_application_id, leaderboard_id, app_id, seq', 'safe', 'on'=>'search'),
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
			'store_leaderboard_application_id' => 'Store Leaderboard Application',
			'leaderboard_id' => 'Leaderboard',
			'app_id' => 'App',
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

		$criteria->compare('store_leaderboard_application_id',$this->store_leaderboard_application_id);
		$criteria->compare('leaderboard_id',$this->leaderboard_id);
		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('seq',$this->seq);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreLeaderboardApplication the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
