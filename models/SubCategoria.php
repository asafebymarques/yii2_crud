<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_categoria".
 *
 * @property int $id_sub_categoria
 * @property string $sub_categoria
 * @property string $descricao
 * @property int $fk_sub_categoria
 * @property int $fk_ativo
 *
 * @property Produto[] $produtos
 * @property Ativo $fkAtivo
 * @property Categoria $fkSubCategoria
 */
class SubCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_categoria', 'fk_sub_categoria', 'fk_ativo'], 'required'],
            [['descricao'], 'string'],
            [['fk_sub_categoria', 'fk_ativo'], 'integer'],
            [['sub_categoria'], 'string', 'max' => 255],
            [['fk_ativo'], 'exist', 'skipOnError' => true, 'targetClass' => Ativo::className(), 'targetAttribute' => ['fk_ativo' => 'id_ativo']],
            [['fk_sub_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['fk_sub_categoria' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sub_categoria' => 'Id Sub Categoria',
            'sub_categoria' => 'Sub Categoria',
            'descricao' => 'Descricao',
            'fk_sub_categoria' => 'Fk Sub Categoria',
            'fk_ativo' => 'Fk Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['fk_sub_categoria' => 'id_sub_categoria']);
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
    public function getFkSubCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'fk_sub_categoria']);
    }
}
