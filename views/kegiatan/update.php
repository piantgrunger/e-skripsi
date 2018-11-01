<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kegiatan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Kegiatan',
]) . $model->id_kegiatan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kegiatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kegiatan, 'url' => ['view', 'id' => $model->id_kegiatan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kegiatan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
