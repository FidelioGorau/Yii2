<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_lesson".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $lesson_id
 */
class StudentLesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'lesson_id'], 'required'],
            [['student_id', 'lesson_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'lesson_id' => 'Lesson ID',
        ];
    }
}
