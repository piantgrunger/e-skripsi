<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ruang */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ruang',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Ruang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="skripsi-create">

<div class="row">
    <div class="col-md-12">
        <div class="x_panel ">
            <div class="x_title">
             
                <h4 class="card-title"><?= $this->title ?></h4>
            </div>
            <div class="x_content">

                <?=
                $this->render('_form', [
                    'model' => $model,
                ]);
                ?>

            </div>
        </div>
    </div>
</div>


</div>
