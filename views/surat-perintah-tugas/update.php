<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratPerintahTugas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Surat Perintah Tugas',
]) . $model->id_spt;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Perintah Tugas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spt, 'url' => ['view', 'id' => $model->id_spt]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="surat-perintah-tugas-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
