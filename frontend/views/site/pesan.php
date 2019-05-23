<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin()?>
    <?= $form->field($model, 'atas_nama')?>
    <?= Html::submitButton("Submit", ['class'=>"btn btn-primary"])?>
<?php ActiveForm::end()?>