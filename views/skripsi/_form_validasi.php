<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use kartik\date\DatePicker;// The controller action that will render the list
?>

  <div class="skripsi-form">

    <?php $form = ActiveForm::begin([
      'options' => [
  "class"=>"form-horizontal"
      ]
      ]); ?>
    <?= $form->errorSummary($model) ?>
      <!-- ADDED HERE -->
     
        <div class="form-group row">
          <label class="control-label text-right col-md-3">Status</label>
        <div class="col-md-9">
          <?= $form->field($model, 'validasi_sidang')->dropDownList(['Belum Validasi'=>'Belum Validasi','Sudah Validasi'=>'Sudah Validasi'])->label(false) ?>


        </div>
         </div>
 

    

        <div class="left col-xs-12">

          <ul class="to_do">
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Proposal Skripsi</div>
                <div class="right col-md-8"> <?=($model->skripsi->proposal=='')?'':"<a data-pjax = 0 target='_blank' href='/document/".$model->skripsi->proposal."'>Download</a>" ?></div>
              </div>
            </li>
         
          </ul>


        </div>
    
    
        <div class="left col-xs-12">

          <ul class="to_do">
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Laporan Skripsi</div>
                <div class="right col-md-8"> <?=($model->skripsi->laporan=='')?'':"<a  data-pjax = 0 target='_blank' href='/document/".$model->skripsi->laporan."'>Download</a>" ?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3 right"> Kartu Bimbingan</div>
              <div class="right col-md-8"> <?=($model->skripsi->kartu_bimbingan=='')?'':"<a data-pjax = 0 target='_blank' href='/document/".$model->skripsi->kartu_bimbingan."'>Download</a>" ?></div>
                     </div>
            </li>
          </ul>


        </div>
        
        
    
      <div class="form-group ">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>

  </div>