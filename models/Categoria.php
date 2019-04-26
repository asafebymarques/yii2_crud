<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id_categoria
 * @property string $categoria
 * @property string $descricao
 * @property int $fk_ativo
 *
 * @property Ativo $fkAtivo
 * @property Produto[] $produtos
 * @property SubCategoria[] $subCategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria', 'fk_ativo'], 'required'],
            [['descricao'], 'string'],
            [['fk_ativo'], 'integer'],
            [['categoria'], 'string', 'max' => 255],
            [['fk_ativo'], 'exist', 'skipOnError' => true, 'targetClass' => Ativo::className(), 'targetAttribute' => ['fk_ativo' => 'id_ativo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'categoria' => 'Categoria',
            'descricao' => 'Descricao',
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
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['fk_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategorias()
    {
        return $this->hasMany(SubCategoria::className(), ['fk_sub_categoria' => 'id_categoria']);
    }
}
