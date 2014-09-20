<?php

/**
 * This is the model class for table "plan".
 *
 * The followings are the available columns in table 'plan':
 * @property string $plan_id
 * @property string $plan_name
 * @property string $plan_desc
 *
 * The followings are the available model relations:
 * @property UserPlan[] $userPlans
 */
class Plan extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'plan';
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
						'plan_name',
						'length',
						'max' => 20 
				),
				array (
						'plan_desc',
						'length',
						'max' => 100 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'plan_id, plan_name, plan_desc',
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
				'userPlans' => array (
						self::HAS_MANY,
						'UserPlan',
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
				'plan_id' => 'Plan',
				'plan_name' => 'Plan Name',
				'plan_desc' => 'Plan Desc' 
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
		
		$criteria->compare ( 'plan_id', $this->plan_id, true );
		$criteria->compare ( 'plan_name', $this->plan_name, true );
		$criteria->compare ( 'plan_desc', $this->plan_desc, true );
		
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
	 * @return Plan the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
