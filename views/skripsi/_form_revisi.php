<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use yii\helpers\Url;
?>

  <div class="skripsi-form">
    
    <table class="table  table-striped table-hover">
    <thead>
      <th>Status</th>
      <th>Nama Dosen</th>
      <th>Revisi</th>
      
      
      </thead>
      <tbody>
          <?php
            foreach($model->detailskripsipembimbings as $detail) {
          echo "<tr>  
             <td>Dosen Pembimbing</td>
                 <td>       ".$detail->dosen->gelardepan."  ". $detail->dosen->nama." " .$detail->dosen->gelarbelakang."
      </td>
             <td>    <a  href=\"".Url::to(['skripsi/detail-revisi','id'=>$detail->id])."\"  data-dismiss=\"modal\" class=\"btn btn-success  btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modalRevisi'> Revisi </a> </td>
          
          
          </tr>
          "   ;      
  
      
          }
        foreach($model->detailskripsipengujis as $detail) {
          
             echo "<tr>  
             <td>Dosen Penguji</td>
                 <td>       ".$detail->dosen->gelardepan."  ". $detail->dosen->nama." " .$detail->dosen->gelarbelakang."
      </td>
             <td>    <a  href=\"".Url::to(['skripsi/detail-revisi-penguji','id'=>$detail->id])."\"  data-dismiss=\"modal\" class=\"btn btn-success  btn-round btn-sm \"   data-toggle = 'modal', data-target = '#modalRevisi'> Revisi </a> </td>
          
          
          
          </tr>
          "   ;      
  

    }

        
        
         ?>
        
      
      
      </tbody>
    
    </table>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>
      <!-- ADDED HERE -->
      <div class="row">
        <label class="control-label col-md-3">Revisi Laporan</label>
        <div class="col-md-9">
          <?= $form->field($model, 'revisi_laporan')->fileInput()->label(false) ?>


        </div>
      </div>




      <div class="form-group ">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>

  </div>