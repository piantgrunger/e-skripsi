<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'nim',
            'nama_mahasiswa',
            'nama_prodi',
   
            'judul_skripsi',
              [
                'attribute' => 'pembimbing',
                'format' =>'raw',
                'value' =>  'nama_pembimbing',
                ],
                  [
                'attribute' => 'penguji',
                'format' =>'raw',
                'value' =>  'nama_penguji',
                ],
         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\SkripsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Skripsi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,

        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,

        'panel' => [
            'type' => GridView::TYPE_INFO,
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.Yii::t('app', 'Skripsi'). '</strong>',
      ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a(Yii::t('app', 'Skripsi  Baru'), ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>
