<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personil */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Personil',
]) . $model->nip;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Personil'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_personil, 'url' => ['view', 'id' => $model->id_personil]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personil-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
