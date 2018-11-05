<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratPerintahTugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-perintah-tugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spt') ?>

    <?= $form->field($model, 'no_spt') ?>

    <?= $form->field($model, 'tgl_surat') ?>

    <?= $form->field($model, 'id_alat_kelengkapan') ?>

    <?= $form->field($model, 'untuk') ?>

    <?php // echo $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'zona') ?>

    <?php // echo $form->field($model, 'tgl_awal') ?>

    <?php // echo $form->field($model, 'tgl_akhir') ?>

    <?php // echo $form->field($model, 'penanda_tangan') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
