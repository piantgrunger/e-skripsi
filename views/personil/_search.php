<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_personil') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'nama_personil') ?>

    <?= $form->field($model, 'status_personil') ?>

    <?= $form->field($model, 'golongan') ?>

    <?php // echo $form->field($model, 'id_pangkat') ?>

    <?php // echo $form->field($model, 'setuju') ?>

    <?php // echo $form->field($model, 'mengetahui') ?>

    <?php // echo $form->field($model, 'lunas') ?>

    <?php // echo $form->field($model, 'tanda_tangan_surat') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
