<?php
use yii\helpers\Html;
use yii\helpers\Url;

$key = is_numeric($key) ? $key : 0;

$js = "$('#modalButton".$key."').click(function (){
    console.log('Hyy');
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});";
$this->registerJS($js);
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
 <td>

<?= Html::button('Realisasi Biaya', ['value' => Url::to(['/surat-perintah-tugas/biaya', 'id' => $model->id_d_spt]), 'class' => 'btn btn-info', 'id' => 'modalButton'.$key]); ?>

  
</td>
