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
      <div class="col-md-5 col-sm-5 col-xs-12 profile_details">

        <div class="left col-xs-12">
          <h2><i class="fa fa-user"></i>
            <?=yii::$app->user->identity->username;?> -
              <?=yii::$app->user->identity->model->nama;?>
          </h2>
          <h4>
            <p> <strong><i class="fa fa-building"></i> Program Studi: </strong>
              <?=yii::$app->user->identity->model->nama_prodi;?>
            </p>
          </h4>
          <ul class="list-unstyled">
            <li><i class="fa fa-home"></i> Alamat:
              <?=yii::$app->user->identity->model->alamat;?>
            </li>
            <li><i class="fa fa-phone"></i> Telepon #:
              <?=yii::$app->user->identity->model->telp;?>
            </li>
            <li><i class="fa fa-graduation-cap"></i> SKS Lulus :
              <?=yii::$app->user->identity->model->skslulus;?>
            </li>
            <li><i class="fa fa-graduation-cap"></i> IP Kumulatif :
              <?=yii::$app->user->identity->model->ipk;?>
            </li>

          </ul>
        </div>

      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">

        <blockquote>
          <?php
               $skripsi = yii::$app->user->identity->model->skripsi;
                                  if(!is_null($skripsi)) {
            ?>                 
          <h2>Judul Skripsi</h2>
          <p>"
            <?=yii::$app->user->identity->model->judul_skripsi;?> "</p>
          <footer> Dosen Pembimbing :<br>
            <ul>
              <?php 
                                  $skripsi = yii::$app->user->identity->model->skripsi;
                                  if(!is_null($skripsi)) {
                                     foreach ($skripsi->detailskripsipembimbings as $detail)  {
                                       
                                           echo "<li> ".$detail->dosen->nip." - ".$detail->dosen->gelardepan." ".$detail->dosen->nama." ".$detail->dosen->gelarbelakang." </li>" ;                   
                                     }
                                  }
                          ?>
            </ul>
          </footer>
          <?php  
                                  }
          else {
                                    
          ?>
          
                     <a href="<?=Url::to(['skripsi/daftar'])?>" class="btn btn-success pull-center btn-round btn-lg"   
                        title ='Daftar Skripsi'> Daftar Skripsi </a>
          
          
        
          
          <?php
            
          }
            ?>
        </blockquote>
        
        
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-5 col-sm-5 col-xs-12 profile_details">
    <div class="x_panel tile fixed_height_300 overflow_hidden">
      <div class="x_title">
        <h3>Data  Skripsi</h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <div class="left col-xs-12">

          <ul class="to_do">
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Proposal Skripsi</div>
                <div class="right col-md-8"> <?=(yii::$app->user->identity->model->proposal=='')?'':"<a href='/document/".yii::$app->user->identity->model->proposal."'>Download</a>" ?></div>
              </div>
            </li>
         
          </ul>


        </div>
        
           <a href="<?=Url::to(['skripsi/upload-sempro'])?>" class="btn btn-primary pull-right btn-round"   data-toggle = 'modal', data-target = '#modal',
                        title ='upload kelengkapan'> Upload Proposal </a>
        
        
        <div class="left col-xs-12">
          <ul class="to_do">
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Laporan Skripsi</div>
                <div class="right col-md-8"> <?=(yii::$app->user->identity->model->laporan=='')?'':"<a href='/document/".yii::$app->user->identity->model->laporan."'>Download</a>" ?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3 right"> Kartu Bimbingan</div>
              <div class="right col-md-8"> <?=(yii::$app->user->identity->model->kartu_bimbingan=='')?'':"<a href='/document/".yii::$app->user->identity->model->kartu_bimbingan."'>Download</a>" ?></div>
                     </div>
            </li>
          </ul>


        </div>
        
           <a href="<?=Url::to(['skripsi/upload-laporan'])?>" class="btn btn-primary pull-right btn-round"   data-toggle = 'modal', data-target = '#modal',
                        title ='upload kelengkapan'> Upload Laporan </a>
          
          
        


      </div>
      
      
    </div>
  </div>
  
    <div class="col-md-7 col-sm-7 col-xs-12 profile_details">
    <div class="x_panel tile fixed_height_600 overflow_hidden">
      <div class="x_title">
        <h3>Data Sidang Skripsi </h3>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <div class="left col-xs-12">
          <h4> Status Validasi Pembimbing Sidang Skripsi</h4>
          
    <ul class="to_do">
            <?php
            
                                  $skripsi = yii::$app->user->identity->model->skripsi;
                                  if(!is_null($skripsi)) {
                                     foreach ($skripsi->detailskripsipembimbings as $detail)  {
             ?>                          
            <li>
              <div class="row">
                <div class="text-right col-md-5"><?= $detail->dosen->nip." - ".$detail->dosen->gelardepan." ".$detail->dosen->nama." ".$detail->dosen->gelarbelakang ?> :</div>
                <div class="right col-md-7"><span class="label label-<?=($detail->validasi_sidang=="Sudah Validasi")?"success":"danger" ?>"> <?= $detail->validasi_sidang ?> </span></div>
              </div>
            </li>
            <?php } } ?>
          </ul>
          <h4> Jadwal Sidang Skripsi</h4>

          <ul class="to_do">
              <li>
              <div class="row">
                <div class="text-right col-md-3"> Ruang Sidang</div>
                <div class="right col-md-8"> <?= yii::$app->user->identity->model->ruang ?></div>
              </div>
            </li>
               <li>
              <div class="row">
                <div class="text-right col-md-3"> Tanggal Sidang</div>
                <div class="right col-md-8"> <?=yii::$app->user->identity->model->tanggal_sidang ?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Jam Sidang</div>
                <div class="right col-md-8"> <?=yii::$app->user->identity->model->jam_sidang ?></div>
              </div>
            </li>
          </ul>

      <h4> Nama Penguji Sidang Skripsi</h4>
          
    <ul class="to_do">
            <?php
            
                                  $skripsi = yii::$app->user->identity->model->skripsi;
                                  if(!is_null($skripsi)) {
                                     foreach ($skripsi->detailskripsipengujis as $detail)  {
             ?>                          
            <li>
              <div class="row">
                <div class="text-right col-md-5"><?= $detail->dosen->nip." - ".$detail->dosen->gelardepan." ".$detail->dosen->nama." ".$detail->dosen->gelarbelakang ?> </div>
                </div>
            </li>
            <?php } } ?>
          </ul>
    
        </div>
        
 
          


      </div>
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
