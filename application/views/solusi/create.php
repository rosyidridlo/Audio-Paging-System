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
			  <h3 class="box-title">Tambah Data Solusi</h3>
			  
			</div>

            <!-- /.box-header -->
            <div class="box-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('solusi/create'); ?>
					<input class="form-control" name="id_solusi" style="opacity: 0.7 ; background-color: yellow" type="text"  value="<?php echo $id; ?>" readonly>
					<br>

					<textarea class="form-control" name="solusi" rows="4" placeholder="Masukan Solusi" required></textarea>
					<br>

					<select name="id_kerusakan" class="form-control" required>
						<option value="" disabled selected hidden>Pilih Data Kerusakan ...</option>
						<?php 
						foreach ($kerusakan as $key):
							echo "<option value='".$key['id_kerusakan']."'>".$key['nama_kerusakan']."</option>";
						endforeach	
						?>	
					</select>
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
