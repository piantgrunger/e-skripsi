<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Surat Masuk',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Masuk'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="surat-masuk-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
