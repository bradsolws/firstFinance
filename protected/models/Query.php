<?php

/**
 * This is the model class for table "query".
 *
 * The followings are the available columns in table 'query':
 * @property string $query_id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $city
 * @property string $query
 */
class Query extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'query';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'name, email',
						'length',
						'max' => 30 
				),
				array (
						'mobile',
						'length',
						'max' => 15 
				),
				array (
						'city',
						'length',
						'max' => 20 
				),
				array (
						'query',
						'length',
						'max' => 500 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'query_id, name, email, mobile, city, query',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array ();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'query_id' => 'Query',
				'name' => 'Name',
				'email' => 'Email',
				'mobile' => 'Mobile',
				'city' => 'City',
				'query' => 'Query' 
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
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'query_id', $this->query_id, true );
		$criteria->compare ( 'name', $this->name, true );
		$criteria->compare ( 'email', $this->email, true );
		$criteria->compare ( 'mobile', $this->mobile, true );
		$criteria->compare ( 'city', $this->city, true );
		$criteria->compare ( 'query', $this->query, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return Query the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
