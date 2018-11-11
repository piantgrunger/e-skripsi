
<?php $formatter = \Yii::$app->formatter; ?>
<td>
<?=$model->nama_biaya; ?>

</td>
<td>

<?=$formatter->asDecimal($model->anggaran); ?></td>
<td>
&nbsp;
<?= $model->durasi; ?> Hari</td>
<td>
&nbsp;
<?= $formatter->asDecimal($model->durasi * $model->anggaran); ?> </td>

<td>
<?=$form->field($model, "[$key]realisasi")->textInput()->label(false); ?>



</td>
<td><?=$form->field($model, "[$key]nama_biaya")->hiddenInput()->label(false); ?>
<?= $form->field($model, "[$key]id_spt")->hiddenInput()->label(false); ?>
<?=$form->field($model, "[$key]anggaran")->hiddenInput()->label(false); ?></td>
