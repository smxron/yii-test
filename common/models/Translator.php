<?php


namespace common\models;

use yii\db\ActiveRecord;

class Translator extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%translators}}';
    }

    public function rules()
    {
        return [
            [['full_name', 'email', 'work_type'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['work_type'], 'integer', 'min' => 1, 'max' => 2],
        ];
    }
}