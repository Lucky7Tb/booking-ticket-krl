<?php

    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use janisto\timepicker\TimePicker;

    $this->title = 'Jadwal Kereta Api';
?>
<div class="jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id_kelas',
            'id_jenis',
            'asal_stasiun',
            'tujuan_stasiun',
            'waktu_berangkat',
            'waktu_sampai',
            'harga',
            'sisa_tiket',

            [
                'header' => "Aksi",
                'class' => 'yii\grid\ActionColumn',
                'template' => "{delete} {update}",
                'buttons' => [
                    'delete' => function ($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['data'=>['confirm'=>"Are You Sure Wanna Delete it?"], 'data-method'=>"POST"]);
                    },
                    'update' => function ($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                    }
                ],
                 'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'update') {
                        $url ='update?id='. base64_encode($model->id_jadwal);
                        return $url;
                    }

                    if ($action === 'delete') {
                        $url ='delete?id='. base64_encode($model->id_jadwal);
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>