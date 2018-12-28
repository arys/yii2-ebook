<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_levels".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $parent
 * @property int $active
 *
 * @property Levels[] $levels
 * @property TypeLevels $parent0
 * @property TypeLevels[] $typeLevels
 */
class TypeLevels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'active'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => TypeLevels::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'parent' => 'Parent',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Levels::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(TypeLevels::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeLevels()
    {
        return $this->hasMany(TypeLevels::className(), ['parent' => 'id']);
    }
}
