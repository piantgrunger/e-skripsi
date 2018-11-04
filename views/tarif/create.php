<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tarif */

$this->title = Yii::t('app', 'Tarif Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tarif'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
