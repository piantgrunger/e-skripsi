<?php

use yii\helpers\Html;
use yii\data\Pagination;

/* @var $this yii\web\View */
/* @var $model app\models\AlatKelengkapan */

$this->title = Yii::t('app', 'Mapping {modelClass}: ', [
    'modelClass' => 'Alat Kelengkapan',
]) . $model->alat_kelengkapan .' - '.$model->tahun;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mapping Alat Kelengkapan'), 'url' => ['index-mapping']];
$this->params['breadcrumbs'][] = ['label' => $model->alat_kelengkapan.' - '.$model->tahun, 'url' => ['view', 'id' => $model->id_alat_kelengkapan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alat-kelengkapan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_mapping', [
        'model' => $model,
       ]) ?>

</div>
