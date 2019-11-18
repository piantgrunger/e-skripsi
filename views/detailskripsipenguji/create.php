<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detailskripsipenguji */

$this->title = Yii::t('app', 'Detailskripsipenguji  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Detailskripsipenguji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailskripsipenguji-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>