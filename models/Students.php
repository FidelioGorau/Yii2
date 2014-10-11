<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 * @property integer $class_id
 */
class Students extends \yii\db\ActiveRecord
{   

    public function getLessons() 
    { 
       return $this->hasMany(Lessons::className(), ['id' => 'lesson_id']) 
                   ->viaTable('student_lesson', ['student_id' => 'id']);
    } 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'name', 'class_id'], 'required'],
            [['school_id', 'class_id'], 'integer'],
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
            'class_id' => 'Class ID',
        ];
    }
}
