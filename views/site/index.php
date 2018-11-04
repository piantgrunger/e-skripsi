<?php

use yii\helpers\Html;
use hscstudio\mimin\components\Mimin;

$this->registerCSSFile('css/metro-all.css');
$this->registerCSSFile('css/start.css');
$this->registerJSFile(Yii::$app->homeUrl.'js/metro.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJSFile(Yii::$app->homeUrl.'js/start.js', ['depends' => [yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $this yii\web\View */

?>
    <div class="container-fluid start-screen no-scroll-y h-100">



    <div class="tiles-grid tiles-group  size-1">
    <?= (Mimin::checkRoute('mimin/route/index')) ? Html::a("
        <span class='mif-user icon'></span>
        <span class='branding-bar'>Route</span>
         ", ['/mimin/route'], ['data-role' => 'tile', 'class ' => 'bg-indigo', 'data-effect' => 'animate-slide-up']) : ''; ?>
    <?= (Mimin::checkRoute('mimin/role/index')) ? Html::a("
        <span class='mif-user icon'></span>
        <span class='branding-bar'>Role</span>
         ", ['/mimin/role'], ['data-role' => 'tile', 'class ' => 'bg-cyan', 'data-effect' => 'animate-slide-up']) : ''; ?>
    <?= (Mimin::checkRoute('mimin/user/index')) ? Html::a("
        <span class='mif-user icon'></span>
        <span class='branding-bar'>User</span>
         ", ['/mimin/user'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-effect' => 'animate-slide-up']) : ''; ?>
</div>
<div class="tiles-grid tiles-group  size-3">



        <?= (Mimin::checkRoute('pangkat/index')) ? Html::a("
        <span class='mif-flow-tree icon'></span>
        <span class='branding-bar'>Pangkat</span>
         ", ['/pangkat'], ['data-role' => 'tile', 'class ' => 'bg-green', 'data-effect' => 'animate-slide-up']) : ''; ?>

        <?= (Mimin::checkRoute('alat-kelengkapan/index')) ? Html::a("
        <span class='fa fa-id-badge icon'></span>
        <span class='branding-bar'>Alat Kelengkapan</span>
         ", ['/alat-kelengkapan'], ['data-role' => 'tile', 'class ' => 'bg-blue', 'data-effect' => 'animate-slide-up']) : ''; ?>

        <?= (Mimin::checkRoute('kota/index')) ? Html::a("
        <span class='fa fa-building-o icon'></span>
        <span class='branding-bar'>Kota</span>
         ", ['/kota'], ['data-role' => 'tile', 'class ' => 'bg-pink', 'data-effect' => 'animate-slide-up']) : ''; ?>
 <?= (Mimin::checkRoute('kegiatan/index')) ? Html::a("
        <span class='fa fa-handshake-o icon'></span>
        <span class='branding-bar'>Kegiatan</span>
         ", ['/kegiatan'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-effect' => 'animate-slide-up']) : ''; ?>

 <?= (Mimin::checkRoute('tarif/index')) ? Html::a("
        <span class='fa fa-money icon'></span>
        <span class='branding-bar'>Tarif</span>
         ", ['/tarif'], ['data-role' => 'tile', 'class ' => 'bg-green', 'data-effect' => 'animate-slide-up']) : ''; ?>
 <?= (Mimin::checkRoute('personil/index')) ? Html::a("
        <span class='fa fa-user-o icon'></span>
        <span class='branding-bar'>Personil</span>
         ", ['/personil'], ['data-role' => 'tile', 'class ' => 'bg-pink', 'data-effect' => 'animate-slide-up']) : ''; ?>


</div>
<div class="tiles-grid tiles-group  size-2">
      <?= (Mimin::checkRoute('alat-kelengkapan/index-mapping')) ? Html::a("
        <span class='fa fa-users icon'></span>
        <span class='branding-bar'>Mapping Alat Kelengkapan</span>
         ", ['/alat-kelengkapan/index-mapping'], ['data-size' => 'wide' ,'data-role' => 'tile', 'class ' => 'bg-blue', 'data-effect' => 'animate-slide-up']) : ''; ?>

</div>
</div>
