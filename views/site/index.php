<?php

use yii\helpers\Html;
use hscstudio\mimin\components\Mimin;

// $this->registerCSSFile('css/metro-all.css');
// $this->registerCSSFile('css/start.css');
// $this->registerJSFile(Yii::$app->homeUrl.'js/metro.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
// $this->registerJSFile(Yii::$app->homeUrl.'js/start.js', ['depends' => [yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $this yii\web\View */

?>
   <div class="row">
   <div class="col-md-12">
    

         <?=$this->render('profile_'.strtolower(\yii::$app->user->identity->jenisUser)) ?>
      
      
      
      
      
      
      

   
   
   </div>
   
   
   </div>
     </div>   
     

