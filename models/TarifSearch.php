<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tarif;

/**
 * TarifSearch represents the model behind the search form of `app\models\Tarif`.
 */
class TarifSearch extends Tarif
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tarif', 'id_pangkat'], 'integer'],
            [['tujuan', 'nama_biaya'], 'safe'],
            [['biaya'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tarif::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tarif' => $this->id_tarif,
            'id_pangkat' => $this->id_pangkat,
            'biaya' => $this->biaya,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'nama_biaya', $this->nama_biaya]);

        return $dataProvider;
    }
}
