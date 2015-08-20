<?php

class Rating extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{rating}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('comment_id', 'unique', 'criteria'=>array(
                'condition'=>'`user_id`=:user_id',
                'params'=>array(
                    ':user_id'=>$this->user_id
                )
            )),
        );
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {

            $validator = CValidator::createValidator('unique', $this, 'comment_id', array(
                'criteria' => array(
                    'condition'=>'`user_id`=:user_id',
                    'params'=>array(
                        ':user_id'=>$this->user_id
                    )
                )
            ));
            $this->getValidatorList()->insertAt(0, $validator);

            return true;
        }
        return false;
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'comment_id' => 'Comment id',
            'user_id' => 'User id',
            'vote_type' => 'Vote type',
        );
    }
}
