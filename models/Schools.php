<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property integer $id
 * @property string $name
 */
class Schools extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30]
        ];
    }
    public function getStudents(){
        return $this->hasMany(Students::className(), ['school_id' => 'id']);
    }
    public function getTeachers(){
        return $this->hasMany(Teachers::className(), ['school_id' => 'id']);
    }
    public function getLessons(){
        return $this->hasMany(Lessons::className(), ['school_id' => 'id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
