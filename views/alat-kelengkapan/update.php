<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlatKelengkapan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Alat Kelengkapan',
]) . $model->id_alat_kelengkapan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Alat Kelengkapan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alat_kelengkapan, 'url' => ['view', 'id' => $model->id_alat_kelengkapan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alat-kelengkapan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
