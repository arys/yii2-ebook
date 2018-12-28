<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remark".
 *
 * @property int $id
 * @property string $text
 * @property int $reviewer_id
 * @property string $date
 * @property int $status
 * @property int $document_id
 *
 * @property Document $document
 * @property Reviewer $reviewer
 */
class Remark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'remark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['reviewer_id', 'document_id'], 'required'],
            [['reviewer_id', 'status', 'document_id'], 'integer'],
            [['date'], 'safe'],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['document_id' => 'id']],
            [['reviewer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reviewer::className(), 'targetAttribute' => ['reviewer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'reviewer_id' => 'Reviewer ID',
            'date' => 'Date',
            'status' => 'Status',
            'document_id' => 'Document ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Document::className(), ['id' => 'document_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewer()
    {
        return $this->hasOne(Reviewer::className(), ['id' => 'reviewer_id']);
    }
}
