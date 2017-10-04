<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $code Код меню
 * @property string $parent_code Код родителя
 * @property string $name Название
 * @property string $icon Иконка
 * @property string $ord Порядок
 * @property int $content Контент
 * @property int $access Доступ
 *
 * @property Menu $parentCode
 * @property Menu[] $menus
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['ord', 'content', 'access'], 'integer'],
            [['code', 'parent_code', 'icon'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 250],
            [['code'], 'unique'],
            [['parent_code'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['parent_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Код меню',
            'parent_code' => 'Код родителя',
            'name' => 'Название',
            'icon' => 'Иконка',
            'ord' => 'Порядок',
            'content' => 'Контент',
            'access' => 'Доступ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCode()
    {
        return $this->hasOne(Menu::className(), ['code' => 'parent_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent_code' => 'code']);
    }
}
