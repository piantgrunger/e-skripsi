<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skripsi;

/**
 * SkripsiSearch represents the model behind the search form of `app\models\Skripsi`.
 */
class SkripsiSearch extends Skripsi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim', 'judul_skripsi', 'proposal', 'kartu_bimbingan'], 'safe'],
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
    public function search($params,$sidang =0)
    {
        $query = Skripsi::find();

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
            'id' => $this->id,
        ]);
      
       if ($sidang==1) {
         $query->andWhere(" tanggal_sidang is not null ");
       }

        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'judul_skripsi', $this->judul_skripsi])
            ->andFilterWhere(['like', 'proposal', $this->proposal])
            ->andFilterWhere(['like', 'kartu_bimbingan', $this->kartu_bimbingan]);
        $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
            $query->andWhere(['kode_unit' => $unit]);

        return $dataProvider;
    }
}
