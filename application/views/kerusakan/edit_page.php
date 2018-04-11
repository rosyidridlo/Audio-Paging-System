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
			  <h3 class="box-title">Edit Data Kerusakan</h3>
			  
			</div>

            <!-- /.box-header -->
            <div class="box-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('kerusakan/edit'); ?>
					<input class="form-control" name="id_kerusakan" style="opacity: 0.7 ; background-color: yellow" type="text"  value="<?php echo $kerusakan['id_kerusakan']; ?>" readonly>
					<br>
					
					<input class="form-control " name="nama_kerusakan" type="text" placeholder="Masukan Nama Kerusakan" value="<?php echo $kerusakan['nama_kerusakan']; ?>" required>
              		<br>

					<input class="form-control " type="text" name="definisi" placeholder="Masukan Detail Kerusakan" value="<?php echo $kerusakan['definisi']; ?>" required>
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




<?php echo form_open('kerusakan/edit'); ?>
	<label for="id_kerusakan">ID Kerusakan</label>
	<input type="text" name="id_kerusakan" style="opacity: 0.7 ; background-color: yellow" value="<?php echo $kerusakan['id_kerusakan']; ?>" readonly><br>

	<label for="nama_kerusakan">Nama Kerusakan</label>
	<input type="text" name="nama_kerusakan" value="<?php echo $kerusakan['nama_kerusakan']; ?>" required><br>

	<label for="definisi">Definisi</label>
	<input type="text" name="definisi" value="<?php echo $kerusakan['definisi']; ?>" required><br>

	<input type="submit" name="Submit" value="Update Data">

</form>