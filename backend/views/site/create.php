<?php

    use yii\helpers\Html;

    $this->title = 'Create Jadwal';
?>
<div class="jadwal-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('form', [
        'model' => $model,
        'namaKereta' => $namaKereta,
        'kelasKereta' => $kelasKereta,
        'stasiun' => $stasiun
    ]) ?>

</div>