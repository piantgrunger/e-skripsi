<?php
use yii\helpers\Html;
use yii\helpers\Url;

$formatter = \Yii::$app->formatter;

$key = is_numeric($key) ? $key : 0;

?>
<td>
<?=is_null($key) ? 0 : $key + 1; ?>
</td>

<td>
<?=$model->nama_personil; ?>

</td>
<td><?= $model->pangkat; ?></td>
<td><?=$model->status_personil; ?>
</td>
<td>
<?=$model->jenis; ?>


</td>
<td><?= $formatter->asDecimal($model->total_anggaran)?></td>

<td><?= $formatter->asDecimal($model->total_realisasi)?></td>
 <td>

<?= Html::a('Realisasi Biaya', Url::to(['/surat-perintah-tugas/biaya', 'id' => $model->id_d_spt]), ['class' => 'btn btn-info', 'id' => 'modalButton'.$key ,'data-toggle' =>'modal','data-target'=> '#modalContent' ]); ?>


</td>
