<?php

/**
 * This is the model class for table "store_application".
 *
 * The followings are the available columns in table 'store_application':
 * @property string $app_id
 * @property string $app_name
 * @property string $description
 * @property string $icon
 * @property double $price
 * @property string $publisher
 * @property string $size
 * @property string $last_updated
 * @property string $version
 * @property double $rating
 * @property string $category_id
 */
class StoreApplication extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('app_id, app_name', 'required'),
			array('price, rating', 'numerical'),
			array('app_id, publisher, size, category_id', 'length', 'max'=>64),
			array('app_name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>4096),
			array('icon', 'length', 'max'=>512),
			array('version', 'length', 'max'=>8),
			array('last_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('app_id, app_name, description, icon, price, publisher, size, last_updated, version, rating, category_id', 'safe', 'on'=>'search'),
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
			'app_id' => 'AppId',
			'app_name' => 'Name',
			'description' => 'Description',
			'icon' => 'Icon',
			'price' => 'Price',
			'publisher' => 'Publisher',
			'size' => 'File Size',
			'last_updated' => 'Last Update',
			'version' => 'Version',
			'rating' => 'Rating',
			'category_id' => 'Category',
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

		$criteria->compare('app_id',$this->app_id,true);
		$criteria->compare('app_name',$this->app_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('last_updated',$this->last_updated,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('category_id',$this->category_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreApplication the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
