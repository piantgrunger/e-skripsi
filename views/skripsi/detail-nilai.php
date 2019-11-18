<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */

$this->title = $model->judul_skripsi;
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
 <table class="table  table-striped table-hover">
    <thead>
      <th>Status</th>
      <th>Nama Dosen</th>
    
      <th>Nilai Metode Penelitian</th>
      <th>Nilai Bahasa dan Teknik Penulisan</th>
      <th>Nilai Materi Skripsi</th>
      <th>Nilai Penguasaan Materi</th>
      <th>Nilai Akhir</th>
      
      
      </thead>
      <tbody>
          <?php
            foreach($model->detailskripsipembimbings as $detail) {
          echo "<tr>  
             <td>Dosen Pembimbing</td>
                 <td>       ".$detail->dosen->gelardepan."  ". $detail->dosen->nama." " .$detail->dosen->gelarbelakang."
      </td>
      
      
      <td>  ".$detail->nilai_akhir."</td>
       <td>  ".$detail->nilai_akhir2."</td>
          
       <td>  ".$detail->nilai_akhir3."</td>
          
       <td>  ".$detail->nilai_akhir4."</td>
          
          
          
          </tr>
          "   ;      
  
      
          }
        foreach($model->detailskripsipengujis as $detail) {
          
             echo "<tr>  
             <td>Dosen Penguji</td>
                 <td>       ".$detail->dosen->gelardepan."  ". $detail->dosen->nama." " .$detail->dosen->gelarbelakang."
      </td>
     
      
    <td>  ".$detail->nilai_akhir."</td>
       <td>  ".$detail->nilai_akhir2."</td>
          
       <td>  ".$detail->nilai_akhir3."</td>
          
       <td>  ".$detail->nilai_akhir4."</td>
          
          
          </tr>
          "   ;      
  

    }

        
        
         ?>
        
        <tfooter>
        <th>
       
          
          
          </th>
     
        <th>
       
         Rata Rata
          
          </th>
        <th>
              
           <?=$model->nilai_akhir?>
          
          
          </th>
        <th>
              
           <?=$model->nilai_akhir2?>
          
          
          </th>
        <th>
              
           <?=$model->nilai_akhir3?>
          
          
          </th>
        <th>
              
           <?=$model->nilai_akhir4?>
          
          
          </th>
                 <th>
              
           <?=$model->nilai_final?>
          
          
          </th>
          
        
        </tfooter>
        
      
      
      </tbody>
    
    </table>
              
              
   <a  href="<?=Url::to(['skripsi/siakad','id'=>$model->id]) ?>"   class="btn btn-success  btn-round "   > Finalisasi Siakad </a> 

            </div>
        </div>
    </div>
</div>

