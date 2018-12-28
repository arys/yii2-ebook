<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "levels".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $parent_id
 * @property int $type_id
 * @property int $active
 *
 * @property TypeLevels $type
 * @property Levels $parent
 * @property Levels[] $levels
 * @property Responsible[] $responsibles
 */
class Levels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'type_id'], 'required'],
            [['parent_id', 'type_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['short_name'], 'string', 'max' => 10],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeLevels::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'short_name' => 'Short Name',
            'parent_id' => 'Parent ID',
            'type_id' => 'Type ID',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeLevels::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Levels::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Levels::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsibles()
    {
        return $this->hasMany(Responsible::className(), ['kafedra_id' => 'id']);
    }

    public function getResponsiblesOne()
    {
        return $this->hasOne(Responsible::className(), ['kafedra_id' => 'id']);
    }

}
