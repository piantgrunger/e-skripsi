<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns = [['class' => 'kartik\grid\SerialColumn'],
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

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update', 'delete', 'view', ], $this->context->route).'{print1}  {print2} {print3}',
              'buttons' => [
                'print1' => function ($url, $model) {
                    if (Mimin::checkRoute($this->context->id.'/print1')) {
                        return
                            Html::a(
                            '<span class="glyphicon glyphicon-print"></span>',
                            ['print1', 'id' => $model->id_spt],
                            [
                                'title' => Yii::t('app', 'Dewan'),
                                'data-pjax' => 0,
                            ]
                        );
                    } else {
                        return ' ';
                    }
                },
                'print2' => function ($url, $model) {
                    if (Mimin::checkRoute($this->context->id.'/print2')) {
                        return
                            Html::a(
                            '<span class="glyphicon glyphicon-print"></span>',
                            ['print2', 'id' => $model->id_spt],
                            [
                                'title' => Yii::t('app', 'Sekretaris Dewan'),
                                'data-pjax' => 0,
                            ]
                        );
                    } else {
                        return ' ';
                    }
                },
                'print3' => function ($url, $model) {
                    if (Mimin::checkRoute($this->context->id.'/print3')) {
                        return
                            Html::a(
                            '<span class="glyphicon glyphicon-print"></span>',
                            ['print3', 'id' => $model->id_spt],
                            [
                                'title' => Yii::t('app', 'Sekretaris Daerah'),
                                'data-pjax' => 0,
                            ]
                        );
                    } else {
                        return ' ';
                    }
                },
            ],
            ],    ];

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratPerintahTugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Surat Perintah Tugas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-perintah-tugas-index">

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
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.Yii::t('app', 'Surat Perintah Tugas').'</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id.'/create'))) ? Html::a(Yii::t('app', 'Surat Perintah Tugas Baru'), ['create'], ['class' => 'btn btn-success']) : ''],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>
