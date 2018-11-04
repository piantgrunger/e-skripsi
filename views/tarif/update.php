<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tarif */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tarif',
]) . $model->id_tarif;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tarif'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tarif, 'url' => ['view', 'id' => $model->id_tarif]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tarif-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
