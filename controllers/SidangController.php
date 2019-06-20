<?php

namespace app\controllers;

use Yii;
use app\models\Mahasiswa;
use app\models\Skripsi;
use app\models\Detailskripsipenguji;
use app\models\SkripsiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



class SidangController extends Controller
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model->scenario = "sidang";

        if ($model->load(Yii::$app->request->post())) {
          $skripsi=Yii::$app->request->post('Skripsi');
          $model = $this->findModel($skripsi['id_skripsi']);
          $model->load(Yii::$app->request->post());
            $model->scenario = "sidang";
          
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailskripsipengujis =  Yii::$app->request->post('Detailskripsipenguji', []);
                $unit = isset($_COOKIE['kodeunit'])?$_COOKIE['kodeunit']:'';
                $model->kode_unit = $unit;
                if ($model->save() && (count($model->detailskripsipengujis) > 0)) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
             if (count($model->detailskripsipengujis) == 0) {
                $model->addError('penguji', 'Data Skripsi Harus Memiliki Dosen penguji');
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
  
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
            $model->scenario = "sidang";

              


        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailskripsipengujis =  Yii::$app->request->post('Detailskripsipenguji', []);
                if ($model->save() && (count($model->detailskripsipengujis) > 0)) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            if (count($model->detailskripsipengujis) == 0) {
                $model->addError('penguji', 'Data Skripsi Harus Memiliki Dosen penguji');
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

  
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $model->tanggal_sidang = null;
        $model->jam_sidang = null;
        $model->id_ruang = null;
       $model->save();
        foreach($model->detailskripsipengujis as $detail) {
           $detail->delete();
        }
      
      
         return $this->redirect(['index']);
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
