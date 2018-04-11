<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo strtoupper($title) ;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
		  <div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header with-border">
			  <h3 class="box-title">Tambah Data Pengguna</h3>
			  
			</div>

            <!-- /.box-header -->
            <div class="box-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('user/create'); ?>
					<input class="form-control" name="id_user" style="opacity: 0.7 ; background-color: yellow" type="text"  value="<?php echo $id; ?>" readonly>
					<br>
					
					<input class="form-control " name="username" type="text" placeholder="Masukan Username">
              		<br>

					<input class="form-control " type="password" name="password" placeholder="Masukan Password">
              		<br>
					
					<input class="form-control " type="email" name="email" placeholder="Masukan E-Mail Address">
              		<br>

					<input class="form-control " type="text" name="nama" placeholder="Masukan Nama Lengkap">
              		<br>

					<input class="form-control " type="text" name="alamat" placeholder="Masukan Alamat">
              		<br>
					<label for="gender">Gender</label><br>
					<input type="radio" name="gender" value="male" checked> Male &nbsp
					<input type="radio" name="gender" value="female"> Female <br><br>
	
					<input class="form-control " type="telp" name="telp" placeholder="Masukan Nomor Telefon">
              		<br>

				
            </div>
			<!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info pull-right">Create User</button>
			  </div>
			  </form>
          </div>
          <!-- /.box -->

        </div>
        
    </section>
    <!-- /.content -->
</div>
 <!-- /.content-wrapper -->


