<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id_usuario
 * @property string $username
 * @property string $password
 * @property string $data_criacao
 * @property string $data_alteracao
 * @property int $fk_nivel
 * @property int $fk_ativo
 *
 * @property Ativo $fkAtivo
 * @property Nivel $fkNivel
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fk_nivel', 'fk_ativo'], 'required'],
            [['username', 'password'], 'string'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['fk_nivel', 'fk_ativo'], 'integer'],
            [['fk_ativo'], 'exist', 'skipOnError' => true, 'targetClass' => Ativo::className(), 'targetAttribute' => ['fk_ativo' => 'id_ativo']],
            [['fk_nivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['fk_nivel' => 'id_nivel']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'username' => 'Username',
            'password' => 'Password',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
            'fk_nivel' => 'Fk Nivel',
            'fk_ativo' => 'Fk Ativo',
        ];
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkAtivo()
    {
        return $this->hasOne(Ativo::className(), ['id_ativo' => 'fk_ativo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNivel()
    {
        return $this->hasOne(Nivel::className(), ['id_nivel' => 'fk_nivel']);
    }
}
