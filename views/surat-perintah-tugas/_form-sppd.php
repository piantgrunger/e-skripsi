<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use  yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\AlatKelengkapan;
use app\models\Personil;
use yii\helpers\Url;

$data = ArrayHelper::map(
    AlatKelengkapan::find()->select(['id_alat_kelengkapan', 'alat_kelengkapan'])->where('tahun='.date('Y'))->asArray()->all(),
'id_alat_kelengkapan',
    'alat_kelengkapan'
);
$data2 = ArrayHelper::map(
    Personil::find()->select(['nama_personil', 'nama_personil'])->where(['in', 'id_personil', [109, 102, 116]])->asArray()->all(),
'nama_personil',
    'nama_personil'
);

/* @var $this yii\web\View */
/* @var $model app\models\SuratPerintahTugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-perintah-tugas-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model); ?> <!-- ADDED HERE -->


    <?= $form->field($model, 'no_spt')->textInput(['readOnly' => true]); ?>
    <?= $form->field($model, 'dasar')->textInput(['readOnly' => true]); ?>

    <?= $form->field($model, 'tgl_surat')->widget(DateControl::className(), ['readonly' => true]); ?>
    <?= $form->field($model, 'untuk')->textarea(['rows' => 6, 'readOnly' => true]); ?>

    <?= $form->field($model, 'tujuan')->textarea(['rows' => 6, 'readOnly' => true]); ?>

    <?= $form->field($model, 'tgl_awal')->widget(DateControl::className(), ['readonly' => true]); ?>

    <?= $form->field($model, 'tgl_akhir')->widget(DateControl::className(), ['readonly' => true]); ?>

    <?= $form->field($model, 'penanda_tangan')->widget(Select2::className(), [
          'data' => $data2,
        'readonly' => true,
        'options' => ['placeholder' => 'Pilih Penandatangan...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
