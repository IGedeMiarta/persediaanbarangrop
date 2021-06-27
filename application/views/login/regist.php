  <div class="form-body" class="container-fluid">
      <div class="website-logo">
          <a href="index.html">
              <div class="logo">
                  <img class="logo-size" src="images/logo-light.svg" alt="">
              </div>
          </a>
      </div>
      <div class="row">
          <div class="img-holder">
              <div class="bg"></div>
              <div class="info-holder">
              </div>
          </div>
          <div class="form-holder">
              <div class="form-content">
                  <div class="form-items">
                      <h3>Buat Akun Baru</h3>
                      <div class="page-links">
                          <a href="<?= base_url('login') ?>">Login</a><a href="<?= base_url('login/regist') ?>" class="active">Register</a>
                      </div>
                      <form class="user" method="post" action="<?php echo base_url('login/regist') ?>">
                          <select class="form-control mb-3" id="role" name="role">
                              <option selected>Pilih Jobdesk</option>
                              <option value="2">Kasir</option>
                              <option value="3">Gudang</option>
                          </select>
                          <input class="form-control" type="text" name="username" placeholder="Username" required>
                          <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                          <input class="form-control" type="password" name="password1" placeholder="Password" required>
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                          <input class="form-control" type="password" name="password2" placeholder="Ulang Password" required>
                          <div class="form-button">
                              <button id="submit" type="submit" class="ibtn">Register</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>