<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 */
class Classes extends \yii\db\ActiveRecord
{    
    public function getStudents() 
    { 
       return $this->hasMany(Students::className(), ['class_id' => 'id']) ;
    } 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'name'], 'required'],
            [['school_id'], 'integer'],
            [['name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'name' => 'Name',
        ];
    }
}
