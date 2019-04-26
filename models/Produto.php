<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id_produto
 * @property string $produto
 * @property string $descricao
 * @property int $fk_categoria
 * @property int $fk_sub_categoria
 * @property int $fk_ativo
 * @property string $data_criacao
 * @property string $data_alteracao
 *
 * @property Ativo $fkAtivo
 * @property Categoria $fkCategoria
 * @property SubCategoria $fkSubCategoria
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto', 'fk_categoria', 'fk_sub_categoria', 'fk_ativo'], 'required'],
            [['descricao'], 'string'],
            [['fk_categoria', 'fk_sub_categoria', 'fk_ativo'], 'integer'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['produto'], 'string', 'max' => 255],
            [['fk_ativo'], 'exist', 'skipOnError' => true, 'targetClass' => Ativo::className(), 'targetAttribute' => ['fk_ativo' => 'id_ativo']],
            [['fk_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['fk_categoria' => 'id_categoria']],
            [['fk_sub_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategoria::className(), 'targetAttribute' => ['fk_sub_categoria' => 'id_sub_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produto' => 'Id Produto',
            'produto' => 'Produto',
            'descricao' => 'Descricao',
            'fk_categoria' => 'Fk Categoria',
            'fk_sub_categoria' => 'Fk Sub Categoria',
            'fk_ativo' => 'Fk Ativo',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
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
    public function getFkCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'fk_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkSubCategoria()
    {
        return $this->hasOne(SubCategoria::className(), ['id_sub_categoria' => 'fk_sub_categoria']);
    }
}
