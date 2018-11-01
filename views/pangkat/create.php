<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pangkat */

$this->title = Yii::t('app', 'Pangkat Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pangkat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pangkat-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
