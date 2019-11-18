<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
use dmstr\widgets\Alert;
use kartik\datecontrol\DateControl;

use yii\bootstrap\Modal;
use yii\helpers\Url;
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
              ["attribute" => 'nim',
                  'value'=>'skripsi.nim'
               ],
                ["attribute" => 'nama_mahasiswa',

           'value' => 'skripsi.nama_mahasiswa',
              ],
         'skripsi.nama_prodi',
        
       
             'skripsi.judul_skripsi',
                'skripsi.ruang_sidang',
                  ["attribute" => 'tanggal_sidang',
                      "format" =>'date',
                 
                "value"=>'skripsi.tanggal_sidang'],
               'skripsi.jam_sidang', 
          
            
    
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
              [
                'attribute' =>'aksi',
                'format' =>'raw',
                'value' => function($data) {
                return 
                               "<a  href=\"".Url::to(['skripsi/nilai-penguji','id'=>$data->id])."\" class=\"btn btn-success pull-right btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modal'> Penilaian Sidang</a>
                                                            
                               <br>
                               <a  href=\"".Url::to(['skripsi/finalisasi','id'=>$data->id])."\" class=\"btn btn-info pull-right btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modal'> Finalisasi Sidang</a>
                               ";
                  
                }
              ]

   ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailskripsipembimbingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Detailskripsipembimbing');
$this->params['breadcrumbs'][] = $this->title;
?>

   
<div class="detailskripsipenguji-index">

      
          
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
             'heading' => '  <strong> '  .yii::$app->user->identity->username.' - '.
              yii::$app->user->identity->model->gelardepan." ".yii::$app->user->identity->model->nama. " ".yii::$app->user->identity->model->gelarbelakang ."<br><br>"
         .Yii::t('app', 'Penguji Mahasiswa Sidang'). '</strong>',
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
       'header' => '<h4>Detail Skripsi</h4>',
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