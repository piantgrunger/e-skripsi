<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kegiatan */

$this->title = Yii::t('app', 'Kegiatan Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kegiatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kegiatan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
