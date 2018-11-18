<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;

/**
 * SuratKeluarSearch represents the model behind the search form of `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_surat_id', 'created_by', 'updated_by'], 'integer'],
            [['tgl_surat', 'nomor_surat', 'perihal_surat', 'lampiran_surat', 'alamat_surat', 'salam_awal_surat', 'isi_surat', 'salam_akhir_surat', 'jabatan_pengirim_surat', 'nama_pengirim_surat', 'nip_surat', 'created_at', 'updated_at'], 'safe'],
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
        $query = SuratKeluar::find();

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
            'jenis_surat_id' => $this->jenis_surat_id,
            'tgl_surat' => $this->tgl_surat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nomor_surat', $this->nomor_surat])
            ->andFilterWhere(['like', 'perihal_surat', $this->perihal_surat])
            ->andFilterWhere(['like', 'lampiran_surat', $this->lampiran_surat])
            ->andFilterWhere(['like', 'alamat_surat', $this->alamat_surat])
            ->andFilterWhere(['like', 'salam_awal_surat', $this->salam_awal_surat])
            ->andFilterWhere(['like', 'isi_surat', $this->isi_surat])
            ->andFilterWhere(['like', 'salam_akhir_surat', $this->salam_akhir_surat])
            ->andFilterWhere(['like', 'jabatan_pengirim_surat', $this->jabatan_pengirim_surat])
            ->andFilterWhere(['like', 'nama_pengirim_surat', $this->nama_pengirim_surat])
            ->andFilterWhere(['like', 'nip_surat', $this->nip_surat]);

        return $dataProvider;
    }
}
