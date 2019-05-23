<?php

    use yii\helpers\Html;

    $this->title = 'Create Jadwal';
?>
<div class="jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form', [
        'model' => $model,
        'namaKereta' => $namaKereta,
        'kelasKereta' => $kelasKereta,
        'stasiun' => $stasiun
    ]) ?>

</div>