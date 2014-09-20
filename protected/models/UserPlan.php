<?php

/**
 * This is the model class for table "user_plan".
 *
 * The followings are the available columns in table 'user_plan':
 * @property string $user_id
 * @property string $plan_id
 * @property double $principal_amt
 * @property double $installment
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Plan $plan
 */
class UserPlan extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'user_plan';
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
						'user_id, plan_id, principal_amt, installment',
						'required' 
				),
				array (
						'principal_amt, installment',
						'numerical' 
				),
				array (
						'user_id',
						'length',
						'max' => 11 
				),
				array (
						'plan_id',
						'length',
						'max' => 5 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'user_id, plan_id, principal_amt, installment',
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
				),
				'plan' => array (
						self::BELONGS_TO,
						'Plan',
						'plan_id' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'user_id' => 'User',
				'plan_id' => 'Plan',
				'principal_amt' => 'Principal Amt',
				'installment' => 'Installment' 
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
		
		$criteria->compare ( 'user_id', $this->user_id, true );
		$criteria->compare ( 'plan_id', $this->plan_id, true );
		$criteria->compare ( 'principal_amt', $this->principal_amt );
		$criteria->compare ( 'installment', $this->installment );
		
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
	 * @return UserPlan the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
