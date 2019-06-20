
<?php
use yii\helpers\Html;
use dmstr\widgets\Alert;
use yii\widgets\Pjax;
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
?>
<div class="x_panel">
  <div class="x_title">
    <h3>Selamat Datang</h3>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 profile_details">

        <div class="left col-xs-12">
          <h2><i class="fa fa-user"></i>
            <?=yii::$app->user->identity->username;?> -
              <?=yii::$app->user->identity->model->gelardepan." ".yii::$app->user->identity->model->nama. " ".yii::$app->user->identity->model->gelarbelakang;?>
        
            
            
        </div>
          
          <br>
          <br>
          <br>
          <h3>Mahasiswa Bimbingan</h3>
          <hr>
          <table class="table table-condensed">
            <thead>
               <th>NIM</th>
              
               <th>Nama</th>
              <th>Program Studi</th>
             
              <th>Judul Skripsi</th>
              <th>Validasi Sidang</th>
              
              <th>Aksi</th>
              
           
            
             </thead>
            <tbody>
              <?php    foreach(yii::$app->user->identity->model->mahasiswaBimbingan as $data) {
  
                          echo "<tr>";
                            echo "<td>".$data->skripsi->nim." </td>";
                            echo "<td>".$data->skripsi->mahasiswa->nama." </td>";
                            echo "<td>".$data->skripsi->mahasiswa->nama_prodi." </td>";
                            echo "<td>".$data->skripsi->judul_skripsi." </td>";
                        echo "<td> <span class=\"label label-".(($data->validasi_sidang=="Sudah Validasi")?"success":"danger") ." \">". $data->validasi_sidang . "</span></td>";
                               echo "<td> <a  href=\"".Url::to(['skripsi/validasi','id'=>$data->id])."\" class=\"btn btn-primary pull-right btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modal'> Validasi Sidang </a> <br> 
                               <a  href=\"".Url::to(['skripsi/nilai','id'=>$data->id])."\" class=\"btn btn-success pull-right btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modal'> Penilaian </a>
                               </td> ";         
                             echo "</tr>";
  
                            }
  
  
                ?>
            
            
            </tbody>   
          
          </table>
         
          

      </div>
        


  </div>
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