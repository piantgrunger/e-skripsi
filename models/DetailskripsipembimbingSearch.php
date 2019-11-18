<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detailskripsipembimbing;

/**
 * DetailskripsipembimbingSearch represents the model behind the search form of `app\models\Detailskripsipembimbing`.
 */
class DetailskripsipembimbingSearch extends Detailskripsipembimbing
{
    /**
     * @inheritdoc
    
     */
  public $nim;  
  public $nama_mahasiswa;
  public $tanggal_sidang;
    
  public function rules()
    {
        return [
            [['id', 'id_skripsi'], 'integer'],

           
            [['nim' ,'tanggal_sidang','validasi_sidang'], 'safe'],
         
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
        $query = Detailskripsipembimbing::find()
        //  ->innerJoinWith("skripsi")
          ->JoinWith(["skripsi.mahasiswa"])
          ;

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
            'id_skripsi' => $this->id_skripsi,
            'nilai' => $this->nilai,
            'nilai_akhir' => $this->nilai_akhir,
        ]);
      $query->andFilterWhere(['tanggal_sidang'=>$this->tanggal_sidang]);
      $query->andWhere(['nip_dosen'=>yii::$app->user->identity->username]);
        $query->andFilterWhere(['like', 'nip_dosen', $this->nip_dosen])
            ->andFilterWhere(['like', 'validasi_sempro', $this->validasi_sempro])
            ->andFilterWhere(['like', 'validasi_sidang', $this->validasi_sidang])
            ->andFilterWhere(['like', 'revisi', $this->revisi])
           ->andFilterWhere(['like', 'skripsi.nim', $this->nim])
      ->andFilterWhere(['like', 'nama', $this->nama_mahasiswa]);

        return $dataProvider;
    }
}
