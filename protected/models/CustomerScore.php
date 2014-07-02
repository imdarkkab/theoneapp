<?php

/**
 * This is the model class for table "customer_score".
 *
 * The followings are the available columns in table 'customer_score':
 * @property integer $score_id
 * @property integer $customer_id
 * @property double $score
 * @property string $created_at
 * @property integer $leaderboard_id
 * @property string $updated_at
 * @property integer $unit_id
 */
class CustomerScore extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, leaderboard_id, unit_id', 'required'),
			array('customer_id, leaderboard_id, unit_id', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('score_id, customer_id, score, created_at, leaderboard_id, updated_at, unit_id', 'safe', 'on'=>'search'),
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
			'score_id' => 'Score',
			'customer_id' => 'Customer',
			'score' => 'Score',
			'created_at' => 'Created At',
			'leaderboard_id' => 'Leaderboard',
			'updated_at' => 'Updated At',
			'unit_id' => 'Unit',
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

		$criteria->compare('score_id',$this->score_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('score',$this->score);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('leaderboard_id',$this->leaderboard_id);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('unit_id',$this->unit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerScore the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
