<?php 
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;

    foreach ($data as $value){
        $model->jumlah_tiket = $value->jumlah_tiket;
        $model->total_harga = $value->total_harga;
    }
?>

<div>
    <?php $form = ActiveForm::begin(['options'=> ['enctype'=> 'multipart/form-data']])?>
        
        <?= $form->field($model, 'jumlah_tiket')->textInput(['disabled'=>true])?>

        <?= $form->field($model, 'total_harga')->textInput(['disabled'=>true])?>

        <?= $form->field($model, 'bukti')->fileInput()?>

        <?= Html::submitButton("Submit", ['class' => "btn btn-primary"])?>

    <?php ActiveForm::end()?>
</div>