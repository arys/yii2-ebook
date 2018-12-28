<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discipline".
 *
 * @property int $id
 * @property int $specialty_id
 * @property string $name
 *
 * @property Specialty $specialty
 * @property Document[] $documents
 */
class Discipline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discipline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['specialty_id'], 'required'],
            [['specialty_id'], 'integer'],
            [['name'], 'string'],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'specialty_id' => 'Specialty ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialty()
    {
        return $this->hasOne(Specialty::className(), ['id' => 'specialty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['discipline_id' => 'id']);
    }
}
