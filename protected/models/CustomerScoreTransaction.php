<?php

/**
 * This is the model class for table "customer_score_transaction".
 *
 * The followings are the available columns in table 'customer_score_transaction':
 * @property integer $transaction_id
 * @property integer $customer_id
 * @property double $score
 * @property string $created_at
 * @property integer $leaderboard_id
 * @property integer $action_id
 * @property string $reference_id
 * @property integer $unit_id
 *
 * The followings are the available model relations:
 * @property Customer $customer
 */
class CustomerScoreTransaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_score_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id', 'required'),
			array('customer_id, leaderboard_id, action_id, unit_id', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
			array('reference_id', 'length', 'max'=>64),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transaction_id, customer_id, score, created_at, leaderboard_id, action_id, reference_id, unit_id', 'safe', 'on'=>'search'),
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
			'transaction_id' => 'Transaction',
			'customer_id' => 'Customer',
			'score' => 'Score',
			'created_at' => 'Created At',
			'leaderboard_id' => 'Leaderboard',
			'action_id' => 'Action',
			'reference_id' => 'Reference',
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

		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('score',$this->score);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('leaderboard_id',$this->leaderboard_id);
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('reference_id',$this->reference_id,true);
		$criteria->compare('unit_id',$this->unit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerScoreTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
