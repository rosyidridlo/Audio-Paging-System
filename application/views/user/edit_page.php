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
			  <h3 class="box-title">Edit Data Pengguna</h3>
			  
			</div>

            <!-- /.box-header -->
            <div class="box-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('user/edit'); ?>
					<input class="form-control" name="id_user" style="opacity: 0.7 ; background-color: yellow" type="text"  value="<?php echo $user['id_user']; ?>" readonly>
					<br>
					
					<input class="form-control " name="username" type="text" placeholder="Masukan Username" value="<?php echo $user['username']; ?>" required>
              		<br>

					<input class="form-control " type="password" name="password" placeholder="Masukan Password" value="<?php echo $user['password']; ?>" required>
              		<br>
					
					<input class="form-control " type="email" name="email" placeholder="Masukan E-Mail Address" value="<?php echo $user['email']; ?>" required>
              		<br>

					<input class="form-control " type="text" name="nama" placeholder="Masukan Nama Lengkap" value="<?php echo $user['nama']; ?>" required>
              		<br>

					<input class="form-control " type="text" name="alamat" placeholder="Masukan Alamat" value="<?php echo $user['alamat']; ?>" required>
              		<br>
					<label for="gender">Gender</label><br>
					<?php 
						switch ($user['id_user']) {
							case 'female':
							?>
								<input type="radio" name="gender" value="male" > Male <br>
								<input type="radio" name="gender" value="female" checked> Female <br>
							<?php
								break;
							
							default:
							?>
								<input type="radio" name="gender" value="male" checked> Male <br>
								<input type="radio" name="gender" value="female"> Female <br>
							<?php
								break;
						}
						?><br>
	
					<input class="form-control " type="telp" name="telp" placeholder="Masukan Nomor Telefon" value="<?php echo $user['no_telp']; ?>" required>
              		<br>

				
            </div>
			<!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info pull-right">Update Data</button>
			  </div>
			  </form>
          </div>
          <!-- /.box -->

        </div>
        
    </section>
    <!-- /.content -->
</div>
 <!-- /.content-wrapper -->


