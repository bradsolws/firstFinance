<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $user_id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property string $create_ts
 * @property string $update_ts
 * @property string $updated_by
 * @property string $role
 *
 * The followings are the available model relations:
 * @property Payment[] $payments
 * @property Tips[] $tips
 * @property User $updatedBy
 * @property User[] $users
 * @property UserLogin $userLogin
 * @property UserPlan $userPlan
 */
class User extends CActiveRecord {
	
	const ROLE_ADMIN=1;
	const ROLE_MEMBER=2;
	const ADMIN = "Administrator";
	const MEMBER = "Member";
	const UNDEFINED = "Undefined";
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return Yii::app ()->getModule ( 'user' )->tableUser;
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array ('name, mobile, address1, city, state, country, pincode, email','required'),
				array ('name','length','max' => 50),
				array ('email','email'),
				array ('email','unique','message' => UserModule::t ( "This user's email address already exists." )),
				array ('mobile','length','max' => 15),
				array ('address1, address2','length','max' => 75),
				array ('city, state, country','length','max' => 30),
				array ('pincode','length','max' => 6),
				array ('updated_by','length','max' => 11),
				array ('role','length','max' => 5),
				array ('mobile, pincode, updated_by, role','numerical'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array ('name, mobile, email, address1, address2, city, state, country, pincode','safe','on' => 'search') 
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
			'payments' => array(self::HAS_MANY, 'Payment', 'user_id'),
			'tips' => array(self::HAS_MANY, 'Tips', 'updated_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'users' => array(self::HAS_MANY, 'User', 'updated_by'),
			'userLogin' => array(self::HAS_ONE, 'UserLogin', 'user_id'),
			'userPlan' => array(self::HAS_ONE, 'UserPlan', 'user_id'),
		);
	}

	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'user_id' => 'User',
				'name' => 'Name',
				'mobile' => 'Mobile',
				'email' => 'Email',
				'address' => 'Address',
				'city' => 'City',
				'state' => 'State',
				'country' => 'Country',
				'pincode' => 'Pincode',
				'create_ts' => 'Registered On',
				'update_ts' => 'Update Ts',
				'updated_by' => 'Updated By',
				'role' => 'Role' 
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'user_id', $this->user_id, true );
		$criteria->compare ( 'name', $this->name, true );
		$criteria->compare ( 'mobile', $this->mobile, true );
		$criteria->compare ( 'email', $this->email, true );
		$criteria->compare ( 'address1', $this->address1, true );
		$criteria->compare ( 'address2', $this->address2, true );
		$criteria->compare ( 'city', $this->city, true );
		$criteria->compare ( 'state', $this->state, true );
		$criteria->compare ( 'country', $this->country, true );
		$criteria->compare ( 'pincode', $this->pincode, true );
		$criteria->compare ( 'create_ts', $this->create_ts, true );
		$criteria->compare ( 'update_ts', $this->update_ts, true );
		$criteria->compare ( 'updated_by', $this->updated_by, true );
		$criteria->compare ( 'role', $this->role, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	public function scopes()
	{
		return array(
				'admin'=>array(
						'condition'=>'role='.self::ROLE_ADMIN,
				),
		);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getRole($role)
	{
		if($role==self::ROLE_ADMIN)
			return self::ADMIN;
		else if($role==self::ROLE_MEMBER)
			return self::MEMBER;
		else 
			return self::UNDEFINED;
	}
	
}
