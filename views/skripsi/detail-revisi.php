<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */
$js = "$('.modal').modal('hide');";

$this->title = $model->skripsi->judul_skripsi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Skripsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel ">
            <div class="x_title">
             
                <h4 class="card-title"><?= $this->title ?></h4>
            </div>
            <div class="x_content">

                 <div class="left col-xs-12">

          <ul class="to_do">
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Nama Dosen </div>
                <div class="right col-md-8"> <?=$model->dosen->gelardepan."  ". $model->dosen->nama." " .$model->dosen->gelarbelakang?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Revisi Sistematika Penulisan </div>
                <div class="right col-md-8"> <?=$model->revisi?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Revisi Metodologi  </div>
                <div class="right col-md-8"> <?=$model->revisi2?></div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="text-right col-md-3"> Revisi Materi</div>
                <div class="right col-md-8"> <?=$model->revisi3?></div>
              </div>
            </li>
         
          </ul>


        </div>
              
      
            </div>
        </div>
    </div>
</div>

