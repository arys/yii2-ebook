<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property int $id
 * @property int $kafedra_id
 * @property string $name
 * @property string $code
 *
 * @property Discipline[] $disciplines
 * @property Document[] $documents
 * @property Levels $kafedra
 */
class Specialty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kafedra_id', 'code'], 'required'],
            [['kafedra_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['code'], 'string', 'max' => 33],
            [['code'], 'unique'],
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
            'kafedra_id' => 'Kafedra ID',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplines()
    {
        return $this->hasMany(Discipline::className(), ['specialty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['specialty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra()
    {
        return $this->hasOne(Levels::className(), ['id' => 'kafedra_id']);
    }
}
