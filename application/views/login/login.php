<div class="form-body" class="container-fluid">
    <!-- <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                <img class="logo-size" src="images/logo-light.svg" alt="">
            </div>
        </a>
    </div> -->
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">

            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="text mb-5">
                        <h3 class="text-center">Sistem Persediaan Bahan Baku</h3>
                        <h3 class="text-center">Umah Kopi Gayo</h3>
                    </div>
                    <?php echo $this->session->flashdata('messege'); ?>
                    <!-- <div class="page-links">
                        <a href="<?= base_url('login') ?>" class="active">Login</a>
                    </div> -->
                    <form class="login100-form validate-form" method="post" action="<?= base_url('login'); ?>">
                        <input class=" form-control" type="text" name="username" placeholder="Username" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <input type="checkbox" id="chk1"><label for="chk1">Remmeber me</label>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>