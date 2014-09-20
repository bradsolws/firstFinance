<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property string $payment_id
 * @property string $user_id
 * @property double $amount
 * @property string $payment_ts
 * @property string $status
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Payment extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'payment';
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
						'user_id, amount, payment_ts',
						'required' 
				),
				array (
						'amount',
						'numerical' 
				),
				array (
						'user_id',
						'length',
						'max' => 11 
				),
				array (
						'status',
						'length',
						'max' => 10 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'payment_id, user_id, amount, payment_ts, status',
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
		return array (
				'user' => array (
						self::BELONGS_TO,
						'User',
						'user_id' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'payment_id' => 'Payment',
				'user_id' => 'User',
				'amount' => 'Amount',
				'payment_ts' => 'Payment Ts',
				'status' => 'Status' 
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
		
		$criteria->compare ( 'payment_id', $this->payment_id, true );
		$criteria->compare ( 'user_id', $this->user_id, true );
		$criteria->compare ( 'amount', $this->amount );
		$criteria->compare ( 'payment_ts', $this->payment_ts, true );
		$criteria->compare ( 'status', $this->status, true );
		
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
	 * @return Payment the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
