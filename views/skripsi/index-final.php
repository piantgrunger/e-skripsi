<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* Important part */

$this->registerCss('
/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 500px;
    overflow-y: auto;
}');
$js = <<<JS
$('#modal').insertAfter($('body'));
  $("#modal").on("shown.bs.modal",function(event){
       var button = $(event.relatedTarget);
       var href = button.attr("href");
       $.pjax.reload("#pjax-modal",{
                 "timeout" : false,
                 "url" :href,
                 "replace" :false,
       });
  });
JS;
$this->registerJs($js);
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
              'tanggal_sidang:date',

              'jam_sidang',
                     [
             'value' => 'ruang.nama',
                'attribute' => 'Ruang'
           ],
         
           
                ["attribute" => 'Nilai Metode Penelitian',
                  "value" =>'nilai_akhir'
                  
                  ],
                    ["attribute" => 'Nilai Bahasa dan Teknik Penulisan',
                  "value" =>'nilai_akhir2'
                  
                  ],
                    ["attribute" => 'Nilai Materi Skripsi',
                  "value" =>'nilai_akhir3'
                  
                  ],
                    ["attribute" => 'Nilai Penguasaan Materi',
                  "value" =>'nilai_akhir4'
                  
                  ],
                  ["attribute" => 'Nilai Akhir',
                  "value" =>'nilai_final'
                  
                  ],
              
              
              
                     [
             'attribute' => 'Nilai KRS',
                'value' => 'mahasiswa.krs.nnumerik'
           ],
                            [
             'attribute' => 'Nilai KRS Huruf',
                'value' => 'mahasiswa.krs.nhuruf'
           ],
                  [
                'attribute' =>'aksi',
                'format' =>'raw',
                'value' => function($data) {
                return 
                  
                               "<a  href=\"".Url::to(['skripsi/detail-finalisasi-nilai','id'=>$data->id])."\" class=\"btn btn-info pull-right btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modal'> Finalisasi Nilai</a>
                               ";
                  
                }
              ]
              
         ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\SkripsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Finalisasi Nilai Skripsi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
             'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.Yii::t('app', 'Skripsi'). '</strong>',
      ],
            'toolbar' => [
        
        '{export}',
        '{toggleData}',
    ],

         'resizableColumns' => true,
    ]);
 ?>
    <?php Pjax::end(); ?>
</div>

   <?php
Modal::begin([
    'id' => 'modal',
       'header' => '<h4>Finalisasi Nilai</h4>',
       'size' => 'modal-lg',
]);
Pjax::begin(
    [
    'id' => 'pjax-modal', 'timeout' => 'false',
    'enablePushState' => 'false',
    'enableReplaceState' => 'false',
]
);
Pjax::end();
?>
 <?php Modal::end(); ?>