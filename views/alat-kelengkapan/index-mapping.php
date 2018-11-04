<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'],
            'alat_kelengkapan',
            'tahun',

         ['class' => 'kartik\grid\ActionColumn',
               'template' => '{Mapping}',
                'buttons' => [
             'Mapping' => function ($url, $model) {
                 return Html::a(
                     '<span class="glyphicon glyphicon-folder-open"></span>',
                  ['alat-kelengkapan/mapping','id'=>$model->id_alat_kelengkapan],
                     [
                             'title' => Yii::t('app', 'Mapping'),
                 ]
                 );
             },
                ]

        ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\AlatKelengkapanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mapping Alat Kelengkapan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-kelengkapan-index">

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
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.Yii::t('app', 'Mapping Alat Kelengkapan'). '</strong>',
      ],
            'toolbar' => [

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
</div>
