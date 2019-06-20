<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ruang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruang-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('nama') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'nama')->textInput(['maxlength' => true])->label(false)?></div></div> 
  
  <div class="row">
<label class="control-label col-md-3">Tempat</label>
        <div class="col-md-7">

    <?= $form->field($model, 'tempat')->textarea(['rows' => 6])->label(false) ?>

    </div>
</div>

      

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
