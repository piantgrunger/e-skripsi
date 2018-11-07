<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'no_spt',
    'tgl_surat:date',
    'dasar',
    'nama_alat_kelengkapan',
    'untuk:ntext',
    'tujuan:ntext',
    'zona',
    'tgl_awal:date',
    'tgl_akhir:date',
    'penanda_tangan',

    [
        'class' => 'kartik\grid\ActionColumn', 'template' => '{sppd}',
        'buttons' => [

            'sppd' => function ($url, $model) {
                if (Mimin::checkRoute($this->context->id . '/print2')) {
                    return
                        Html::a(
                        'Cetak SPPD',
                        ['print3', 'id' => $model->id_spt],
                        [
                            'class' => 'btn btn-primary'

                        ]
                    );
                } else {
                    return ' ';
                }
            },
        ],
    ],
];

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratPerintahTugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,

        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,

        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> ' . Yii::t('app', 'Surat Perintah Perjalanan Dinas') . '</strong>',
        ],
        'toolbar' => [

            '{export}',
            '{toggleData}',
        ],

        'resizableColumns' => true,
    ]);
    ?>
    <?php Pjax::end(); ?>