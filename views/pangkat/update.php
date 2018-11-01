<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pangkat */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pangkat',
]) . $model->id_pangkat;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pangkat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pangkat, 'url' => ['view', 'id' => $model->id_pangkat]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pangkat-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
