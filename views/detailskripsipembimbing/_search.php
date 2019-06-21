<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailskripsipembimbingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailskripsipembimbing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_skripsi') ?>

    <?= $form->field($model, 'nip_dosen') ?>

    <?= $form->field($model, 'validasi_sempro') ?>

    <?= $form->field($model, 'validasi_sidang') ?>

    <?php // echo $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'revisi') ?>

    <?php // echo $form->field($model, 'nilai_akhir') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
