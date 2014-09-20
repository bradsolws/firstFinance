<?php

/**
 * This is the model class for table "tips".
 *
 * The followings are the available columns in table 'tips':
 * @property string $tip_id
 * @property string $tip_desc
 * @property string $create_ts
 * @property string $update_ts
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property User $updatedBy
 */
class Tips extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'tips';
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
						'update_ts, updated_by',
						'required' 
				),
				array (
						'tip_desc',
						'length',
						'max' => 100 
				),
				array (
						'updated_by',
						'length',
						'max' => 11 
				),
				array (
						'create_ts',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'tip_id, tip_desc, create_ts, update_ts, updated_by',
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
				'updatedBy' => array (
						self::BELONGS_TO,
						'User',
						'updated_by' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'tip_id' => 'Tip',
				'tip_desc' => 'Tip Desc',
				'create_ts' => 'Create Ts',
				'update_ts' => 'Update Ts',
				'updated_by' => 'Updated By' 
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
		
		$criteria->compare ( 'tip_id', $this->tip_id, true );
		$criteria->compare ( 'tip_desc', $this->tip_desc, true );
		$criteria->compare ( 'create_ts', $this->create_ts, true );
		$criteria->compare ( 'update_ts', $this->update_ts, true );
		$criteria->compare ( 'updated_by', $this->updated_by, true );
		
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
	 * @return Tips the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
