<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arxius_so".
 *
 * @property integer $arxiu_id
 * @property string $arxiu_nom
 * @property string $arxiu_path
 * @property string $arxiu_tags
 * @property integer $user_id
 *
 * @property User $user
 */
class Arxiusso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    
    
     
    public static function tableName()
    {
        return 'arxius_so';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arxiu_nom'], 'required'],
            [['user_id'], 'integer'],
            [['arxiu_nom'], 'string', 'max' => 100],
            [['file'],'file'],
            [['arxiu_path', 'arxiu_tags'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'arxiu_id' => 'Arxiu ID',
            'arxiu_nom' => 'Arxiu Nom',
            'arxiu_path' => 'Arxiu Path',
            'arxiu_tags' => 'Arxiu Tags',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
