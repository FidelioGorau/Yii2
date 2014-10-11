<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $name
 * @property integer $school_id
 * @property integer $lesson_id
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'school_id', 'lesson_id'], 'required'],
            [['school_id', 'lesson_id'], 'integer'],
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
            'name' => 'Name',
            'school_id' => 'School ID',
            'lesson_id' => 'Lesson ID',
        ];
    }
}
