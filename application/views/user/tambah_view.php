<?php if(! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-plus" style="color:green"> </i> Tambah User
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
      <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah User</li>
    </ol>
  </section>
  <section class="content">
  <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border"></div>
              <div class="box-body">
                <form action="<?php echo base_url('user/add');?>" method="POST" enctype="multipart/form-data">
                  <!-- CSRF Token jika aktif -->
                  <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama Pengguna">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="lahir" required placeholder="Contoh : Bekasi">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="user" required placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" required placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" required>
                          <option value="Petugas">Petugas</option>
                          <option value="Anggota">Anggota</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label><input type="radio" name="jenkel" value="Laki-Laki" required> Laki-Laki</label><br/>
                        <label><input type="radio" name="jenkel" value="Perempuan" required> Perempuan</label>
                      </div>
                      <div class="form-group">
                        <label>Telepon</label>
                        <input class="form-control" name="telepon" required placeholder="Contoh : 089618173609">
                      </div>
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" required placeholder="Contoh : email@domain.com">
                      </div>
                      <div class="form-group">
                        <label>Pas Foto (Opsional)</label>
                        <input type="file" accept="image/*" name="gambar">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                    <a href="<?= base_url('user');?>" class="btn btn-danger btn-md">Kembali</a>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>
</div>
