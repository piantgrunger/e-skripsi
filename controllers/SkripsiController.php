<?php

namespace app\controllers;

use Yii;
use app\models\Mahasiswa;
use app\models\Skripsi;
use app\models\Detailskripsipembimbing;
use app\models\Detailskripsipenguji;
use app\models\SkripsiSearch;
use app\models\Skalanilai;
use app\models\Krs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * SkripsiController implements the CRUD actions for Skripsi model.
 */
class SkripsiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Skripsi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkripsiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionFinalisasiNilai()
    {
        $searchModel = new SkripsiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);

        return $this->render('index-final', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
      
      
    }
    public function actionDetailFinalisasiNilai($id)
    {
        
      //  die($nim);
        $model = $this->findModel($id);

      
        return $this->renderAjax('detail-nilai', [
            'model'=>$model,
            ]);
    }
  
  
   public function actionSiakad($id){
      $model=$this->findModel($id);
      $kodemk=$model->mahasiswa->krs->kodemk;
      $periode=$model->mahasiswa->krs->periode;
      $nim=$model->mahasiswa->nim;
      $thnkurikulum=$model->mahasiswa->krs->thnkurikulum;
     
     
      $skalanilai =  Skalanilai::find()->where(["thnkurikulum"=>$thnkurikulum])->andWhere(["<=","batasbawah",$model->nilai_final])->andWhere([">=","batasatas",$model->nilai_final]) ->one();
      $nilaiHuruf = $skalanilai->nhuruf; 
      $nilaiAngka = $skalanilai->nangkasn; 
      
     $krs = Krs::find()->where(["kodemk"=>$kodemk,'periode'=>$periode,'nim'=>$nim])->one();
      if(is_null($krs))
      {
            Yii::$app->session->setFlash('error', 'Mahasiswa Belum Memprogram KRS Skripsi /Tugas Akhir');
            return $this->redirect(['finalisasi-nilai']);
        
      } 
     
try {
     $krs->nnumerik = $model->nilai_final;
     $krs->nangka = $nilaiAngka;
     $krs->nhuruf = $nilaiHuruf;
      $krs->lulus = -1;
      $krs->dipakai = -1;
      $krs->nilaimasuk = -1;
      $krs->ulang = 0;
      $krs->autonilai = -1;
      $krs->t_updateuser= \yii::$app->user->identity->username;
     $krs->t_updateip = \yii::$app->getRequest()->getUserIP();
     $krs->t_updateact = 'u-set_nilai';
     $krs->save();
         return $this->redirect(['finalisasi-nilai']);
  } catch ( yii\db\Exception $e) {
  
   

     Yii::$app->session->setFlash('error', $e->errorInfo[2]);

      return $this->redirect(['finalisasi-nilai']);

}

        
     
       
     
  
   
   
   
   }

    /**
     * Displays a single Skripsi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUploadSempro()
    {
        $nim= Yii::$app->user->identity->username;
      //  die($nim);
        $model = Skripsi::find()->where(['nim'=>$nim])->one();
        if ($model===null) {
            throw new NotFoundHttpException('Anda Belum Memiliki Data Skripsi Hubungi Kaprodi');
        }
        if ($model->load(Yii::$app->request->post()) && $model->upload('proposal') && $model->save()) {
          return $this->redirect(["site/index"]);
        }
        return $this->renderAjax('upload', [
            'model'=>$model,
            ]);
    }
    public function actionValidasi($id)
    {
        
      //  die($nim);
        $model = Detailskripsipembimbing::findOne($id);

        if ($model->load(Yii::$app->request->post())   && $model->save()) {
          return $this->redirect(["detailskripsipembimbing/index"]);
        }
        return $this->renderAjax('validasi', [
            'model'=>$model,
            ]);
    }
      public function actionNilai($id)
    {
        
      //  die($nim);
        $model = Detailskripsipembimbing::findOne($id);

        if ($model->load(Yii::$app->request->post())   && $model->save()) {
          return $this->redirect(["detailskripsipembimbing/index"]);
        }
        return $this->renderAjax('nilai', [
            'model'=>$model,
            ]);
    }
  public function actionNilaiPenguji($id)
    {
        
      //  die($nim);
        $model = Detailskripsipenguji::findOne($id);

        if ($model->load(Yii::$app->request->post())   && $model->save()) {
          return $this->redirect(["detailskripsipenguji/index"]);
        }
        return $this->renderAjax('nilai', [
            'model'=>$model,
            ]);
    }

  public function actionUploadLaporan()
    {
        $nim= Yii::$app->user->identity->username;
      //  die($nim);
        $model = Skripsi::find()->where(['nim'=>$nim])->one();
        if ($model===null) {
            throw new NotFoundHttpException('Anda Belum Memiliki Data Skripsi Hubungi Kaprodi');
        }
        if ($model->load(Yii::$app->request->post()) && $model->upload('kartu_bimbingan') && $model->upload('laporan') && $model->save()) {
          return $this->redirect(["site/index"]);
        }
        return $this->renderAjax('upload-laporan', [
            'model'=>$model,
            ]);
      }

   public function actionUploadRevisi()
    {
        $nim= Yii::$app->user->identity->username;
      //  die($nim);
        $model = Skripsi::find()->where(['nim'=>$nim])->one();
        if ($model===null) {
            throw new NotFoundHttpException('Anda Belum Memiliki Data Skripsi Hubungi Kaprodi');
        }
        if ($model->nilai===0) {
            throw new NotFoundHttpException('Anda Belum Melakukan Sidang Skripsi ');
        }
     
        if ($model->load(Yii::$app->request->post()) && $model->upload('revisi_laporan') && $model->save()) {
          return $this->redirect(["site/index"]);
        }
        return $this->renderAjax('upload-revisi', [
            'model'=>$model,
            ]);
    }
  
   public function actionDetailRevisi($id)
    {
       $model = Detailskripsipembimbing::findOne($id);

      
        return $this->renderAjax('detail-revisi', [
            'model'=>$model,
            ]);
    }
    
   public function actionDetailRevisiPenguji($id)
    {
       $model = Detailskripsipenguji::findOne($id);

      
        return $this->renderAjax('detail-revisi', [
            'model'=>$model,
            ]);
    }
  
  public function actionFinalisasiPembimbing($id)
    {
          $model = Detailskripsipembimbing::findOne($id);

        if ($model->load(Yii::$app->request->post())   && $model->save()) {
          return $this->redirect(["detailskripsipembimbing/index"]);
        }
        return $this->renderAjax('finalisasi', [
            'model'=>$model,
            ]);
    }
public function actionFinalisasi($id)
    {
          $model = Detailskripsipenguji::findOne($id);

        if ($model->load(Yii::$app->request->post())   && $model->save()) {
          return $this->redirect(["detailskripsipenguji/index"]);
        }
        return $this->renderAjax('finalisasi', [
            'model'=>$model,
            ]);
    }

    /**
     * Creates a new Skripsi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skripsi();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailskripsipembimbings =  Yii::$app->request->post('Detailskripsipembimbing', []);
                $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
                $model->kode_unit = $unit;
                if ($model->save() && (count($model->detailskripsipembimbings) > 0)) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            if (count($model->detailskripsipembimbings) == 0) {
                $model->addError('Pembimbing', 'Data Skripsi Silahkan Masukkan Data Skripsi Terlebih Dahulu');
            }


            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
               'model' => $model,
            ]);
        }
    }
  
  
      public function actionDaftar()
    {
        
      $nim= Yii::$app->user->identity->username;
      $mahasiswa = mahasiswa::findOne($nim);  
  
 

      if(is_null($mahasiswa->krs))
      {
            Yii::$app->session->setFlash('error', 'Anda Belum Memprogram KRS Skripsi / Tugas Akhir');
           return $this->redirect(['site/index']);
        
      }   
        $model = new Skripsi();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailskripsipembimbings =  Yii::$app->request->post('Detailskripsipembimbing', []);
                $unit = yii::$app->user->identity->model->kodeunit;
                $model->kode_unit = $unit;
                if ($model->save()   && (count($model->detailskripsipembimbings) > 0))  {
                    $transaction->commit();
                    return $this->redirect(['site/index']);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
          
             if (count($model->detailskripsipembimbings) == 0) {
                $model->addError('Pembimbing', ' Silahkan Masukkan Data Pembimbing Skripsi Terlebih Dahulu');
            }

     

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
               'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Skripsi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailskripsipembimbings =  Yii::$app->request->post('Detailskripsipembimbing', []);
                if ($model->save() && (count($model->detailskripsipembimbings) > 0)) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            if (count($model->detailskripsipembimbings) == 0) {
                $model->addError('Pembimbing', ' Silahkan Masukkan Data Pembimbing Skripsi Terlebih Dahulu');
            }


            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Skripsi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        try {
            $this->findModel($id)->delete();
        } catch (\yii\db\IntegrityException  $e) {
            Yii::$app->session->setFlash('error', 'Data Tidak Dapat Dihapus Karena Dipakai Modul Lain');
        }
         return $this->redirect(['index']);
    }

    /**
     * Finds the Skripsi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Skripsi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionNimList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query="select nim as id,concat(nim,' - ',nama) as text from akademik.ms_mahasiswa
            where (lower(nim) like lower('%$q%') or lower(nama) like lower('%$q%') )
            and kodeunit = '$unit'
            limit 20    ";
            $command = Yii::$app->db_siakad->createCommand($query);
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => $id . ' - ' . Mahasiswa::find($id)->nama];
        }
        return $out;
    }
  
    public function actionSkripsiList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query="select  id,concat(nim,' - ',judul_skripsi) as text from skripsi
            where (lower(nim) like lower('%$q%') or lower(judul_skripsi) like lower('%$q%') )
            and kode_unit = '$unit'
            limit 20    ";
            $command = Yii::$app->db->createCommand($query);
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => $id . ' - ' . Mahasiswa::find($id)->nama];
        }
        return $out;
    }
    public function actionNipList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
         $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
      
        if (!is_null($q)) {
            $query="select nip as id,concat(nip,' - ',nama) as text from kepegawaian.ms_pegawai
            
            where (lower(nip) like lower('%$q%') or lower(nama) like lower('%$q%')) 
            
      
            
            limit 20    ";
            $command = Yii::$app->db_siakad->createCommand($query);
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => $id . ' - ' . Dosen::find($id)->nama];
        }
        return $out;
    }

    protected function findModel($id)
    {
        if (($model = Skripsi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
