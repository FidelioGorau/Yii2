<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $country
 * @property string $name
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }
    /**
     * @relations
     */

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country', 'name'], 'required'],
            [['id'], 'integer'],
            [['country', 'name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'name' => 'Name',
        ];
    }
}
