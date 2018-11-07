<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;

$item =
    [
    [
        'label' => 'Data Surat Perintah Tugas',
        'content' =>
                            $this->render('tab-spt', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                            ]),
        'active' => true,
    ],
    [
        'label' => 'Data Surat Perintah Perjalanan Dinas',
        'content' => $this->render('tab-sppd', [
            'searchModel' => $searchModel1,
            'dataProvider' => $dataProvider1,
        ]),

    ],
];

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratPerintahTugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Surat Perintah Perjalanan Dinas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-perintah-pd-index">
  <?= Tabs::widget([
        'items' => $item,
        'options' => ['class' => 'nav-pills'], //
    ]);
    ?>
</div>
