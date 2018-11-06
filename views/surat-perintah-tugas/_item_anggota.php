<?php
$key = is_numeric($key) ? $key : 0;

?>
<td>
<?=is_null($key) ? 0 : $key + 1; ?>
</td>
<td>
<?= $form->field($model, "[$key]id_personil")->hiddenInput()->label(false); ?><?= $model->nama_personil; ?>
</td>
<td><?= $model->pangkat; ?></td>
<td><?=$model->status_personil; ?>
</td>
<td>
<?=$model->jenis; ?>
<?= $form->field($model, "[$key]jenis")->hiddenInput()->label(false); ?>

</td>
 <td>
<?= $form->field($model, "[$key]id_d_spt")->hiddenInput()->label(false); ?>

    <a data-action="delete" id='delete2'><span class="glyphicon glyphicon-trash">
</td>
