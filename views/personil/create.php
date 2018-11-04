<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personil */

$this->title = Yii::t('app', 'Personil Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Personil'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personil-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
