<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ativo".
 *
 * @property int $id_ativo
 * @property string $descricao
 *
 * @property Categoria[] $categorias
 * @property Produto[] $produtos
 * @property SubCategoria[] $subCategorias
 * @property Usuario[] $usuarios
 */
class Ativo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ativo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ativo' => 'Id Ativo',
            'descricao' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::className(), ['fk_ativo' => 'id_ativo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['fk_ativo' => 'id_ativo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategorias()
    {
        return $this->hasMany(SubCategoria::className(), ['fk_ativo' => 'id_ativo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['fk_ativo' => 'id_ativo']);
    }
}
