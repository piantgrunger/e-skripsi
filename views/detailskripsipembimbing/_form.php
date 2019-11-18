<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detailskripsipembimbing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailskripsipembimbing-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('id_skripsi') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'id_skripsi')->textInput()->label(false)?></div></div> 

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('nip_dosen') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'nip_dosen')->textInput(['maxlength' => true])->label(false)?></div></div> 

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('validasi_sempro') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'validasi_sempro')->textInput(['maxlength' => true])->label(false)?></div></div> 

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('validasi_sidang') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'validasi_sidang')->textInput(['maxlength' => true])->label(false)?></div></div> 

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('nilai') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'nilai')->textInput()->label(false)?></div></div> 

      

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('nilai_akhir') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'nilai_akhir')->textInput()->label(false)?></div></div> 

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
