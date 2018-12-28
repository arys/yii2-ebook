<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property int $type_id
 * @property int $language_id
 * @property int $discipline_id
 * @property int $specialty_id
 * @property int $plan_id
 * @property int $responsible_id
 * @property int $reviewer_id
 * @property string $finish_date
 * @property string $token
 * @property int $status
 * @property string $path
 *
 * @property Discipline $discipline
 * @property Language $language
 * @property Plan $plan
 * @property Responsible $responsible
 * @property Reviewer $reviewer
 * @property Specialty $specialty
 * @property Type $type
 * @property DocumentAuthor[] $documentAuthors
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'language_id', 'discipline_id', 'specialty_id', 'plan_id', 'responsible_id', 'reviewer_id'], 'required'],
            [['type_id', 'language_id', 'discipline_id', 'specialty_id', 'plan_id', 'responsible_id', 'reviewer_id', 'status'], 'integer'],
            [['finish_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['token'], 'string', 'max' => 32],
            [['path'], 'string', 'max' => 128],
            [['discipline_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discipline::className(), 'targetAttribute' => ['discipline_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => Responsible::className(), 'targetAttribute' => ['responsible_id' => 'id']],
            [['reviewer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reviewer::className(), 'targetAttribute' => ['reviewer_id' => 'id']],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_id' => 'Type ID',
            'language_id' => 'Language ID',
            'discipline_id' => 'Discipline ID',
            'specialty_id' => 'Specialty ID',
            'plan_id' => 'Plan ID',
            'responsible_id' => 'Responsible ID',
            'reviewer_id' => 'Reviewer ID',
            'finish_date' => 'Finish Date',
            'token' => 'Token',
            'status' => 'Status',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscipline()
    {
        return $this->hasOne(Discipline::className(), ['id' => 'discipline_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Responsible::className(), ['id' => 'responsible_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewer()
    {
        return $this->hasOne(Reviewer::className(), ['id' => 'reviewer_id']);
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
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentAuthors()
    {
        return $this->hasMany(DocumentAuthor::className(), ['document_id' => 'id']);
    }


}
