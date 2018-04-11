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
			  <h3 class="box-title">Tambah Data Kerusakan</h3>
			  
			</div>

            <!-- /.box-header -->
            <div class="box-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('kerusakan/create'); ?>
					<input class="form-control" name="id_kerusakan" style="opacity: 0.7 ; background-color: yellow" type="text"  value="<?php echo $id; ?>" readonly>
					<br>
					
					<input class="form-control " name="nama_kerusakan" type="text" placeholder="Masukan Nama Kerusakan">
              		<br>

					<input class="form-control " type="text" name="definisi" placeholder="Masukan Detail Kerusakan">
              		<br>				
            </div>
			<!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" name="Submit" class="btn btn-info pull-right">Create Data</button>
			  </div>
			  </form>
          </div>
          <!-- /.box -->

        </div>
        
    </section>
    <!-- /.content -->
</div>
 <!-- /.content-wrapper -->


