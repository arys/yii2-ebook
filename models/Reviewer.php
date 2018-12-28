<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviewer".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property int $level
 * @property int $level_id идентификатор подразделения
 *
 * @property Document[] $documents
 * @property Levels $level0
 */
class Reviewer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviewer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level', 'level_id'], 'integer'],
            [['email', 'phone'], 'string', 'max' => 33],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'level' => 'Level',
            'level_id' => 'Level ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['reviewer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel0()
    {
        return $this->hasOne(Levels::className(), ['id' => 'level_id']);
    }
}
