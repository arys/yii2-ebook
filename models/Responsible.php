<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsible".
 *
 * @property int $id
 * @property int $user_id
 * @property int $kafedra_id
 * @property string $name
 * @property string $suname
 * @property string $second_name
 * @property int $rstatus 0 - не назначен. 1 - назначен
 *
 * @property Document[] $documents
 * @property User $user
 * @property Levels $kafedra
 */
class Responsible extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responsible';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rstatus'], 'required'],
            [['user_id', 'kafedra_id', 'rstatus'], 'integer'],
            [['name', 'suname', 'second_name'], 'string', 'max' => 33],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['kafedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['kafedra_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'kafedra_id' => 'Kafedra ID',
            'name' => 'Name',
            'suname' => 'Suname',
            'second_name' => 'Second Name',
            'rstatus' => 'Rstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['responsible_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra()
    {
        return $this->hasOne(Levels::className(), ['id' => 'kafedra_id']);
    }
}
