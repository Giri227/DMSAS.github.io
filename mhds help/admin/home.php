<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 position-relative bg-gradient bg-info bg-opacity-25 border-end border-dark">
                <div class="p-3 text-center">
                    <?php 
                    $categories = $conn->query("SELECT * FROM `category_list` where delete_flag = 0")->num_rows;
                    ?>
                    <h1 class="text-light"><span id="state1" countto="70"><?= number_format($categories) ?></span></h1>
                    <h5 class="mt-3 text-light">Categories</h5>
                    <p class="text-lg h2 font-weight-normal text-dark"><span style="font-size:3rem" class="material-icons">view_list</span></p>
                </div>
            </div>
            <div class="col-md-6 position-relative bg-gradient bg-info bg-opacity-50">
                <div class="p-3 text-center">
                    <?php 
                    $clinic = $conn->query("SELECT * FROM `clinic_list` where delete_flag = 0 ")->num_rows;
                    ?>
                    <h1 class="text-light"><span id="state1" countto="70"><?= number_format($clinic) ?></span></h1>
                    <h5 class="mt-3 text-light">Clinics</h5>
                    <p class="text-lg h2 font-weight-normal text-danger"><span style="font-size:3rem" class="material-icons">medical_services</span></p>
                </div>
                <hr class="vertical dark">
            </div>
        </div>
    </div>
</section>

<section class="py-1">
    <div class="container">
        <h3 class="text-center fw-bolder">Welcome to <?= $_settings->info('name') ?></h3>
    </div>
</section>