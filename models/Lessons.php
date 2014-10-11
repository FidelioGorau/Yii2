<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 * @property integer $class_id
 */
class Lessons extends \yii\db\ActiveRecord
{
    public function getStudents()
    {
    return $this->hasMany(Students::className(), ['id' => 'student_id'])
            ->viaTable('student_lesson', ['lesson_id' => 'id']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lessons';
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
