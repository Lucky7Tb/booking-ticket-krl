<?php
    $this->title = 'Admin Dashboard';
?>
<div class="site-index">

    <div class="body-content">
        <div class="typed-container text-center">
            <h1 class="Typed"></h1>
        </div>

        <div class="row container-costume">

            <div class="col-lg-4 col-md-4 col-sm-6" data-aos="flip-left">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Atur Jadwal Kereta Api</h3>
                    </div>
                    <div class="panel-body">
                        <p>Pengaturan jadwal kereta api</p>

                        <p><a class="btn btn-default" href="addjadwal">Go To &raquo;</a></p>
                    </div>
                </div>
            </div>
         
            <div class="col-lg-4 col-md-4 col-sm-6" data-aos="flip-left" data-aos-delay="300">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Atur Pemesanan User</h3>
                    </div>
                    <div class="panel-body">
                        <p>Pengaturan pemesanan untuk User</p>

                        <p><a class="btn btn-default" href="konfirmasi">Go To &raquo;</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12" data-aos="flip-left" data-aos-delay="600">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register Admin Baru</h3>
                    </div>
                    <div class="panel-body">
                        <p>Pengaturan untuk menambahkan admin</p>

                        <p><a class="btn btn-default" href="register">Go To &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
    $script = <<<JS

    var typed3 = new Typed('.Typed', {
        strings: ['Selamat <strong class="str_typed">Datang</strong>','Selamat <strong class="str_typed">Bekerja</strong>'],
        typeSpeed: 70,
        backSpeed: 65,
        startDelay: 500,
        smartBackspace: true,
        loop: true
    });
        
JS;
$this->registerJs($script);