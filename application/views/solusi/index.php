<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo strtoupper($title) ;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo strtoupper($title) ;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
		  <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
			  <h3 class="box-title">Data Solusi</h3>
			  <a href="<?php echo base_url('solusi/create');?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>ID Solusi</th>
				  <th>Solusi</th>
				  <th>Nama Kerusakan</th>
				  <th>Action</th>
                </tr>
                <!-- <tr> -->
					<?php $no = 1 ?>
                  <?php foreach($solusi as $row): ?>
					<tr>
						<td><?php echo $no++ ; ?></td>
						<td><a href=<?php echo base_url().'solusi/view/'.$row['id_solusi']; ?>><span class="badge bg-light-blue"><?php echo $row['id_solusi']; ?></span></a></td>
						<td><?php echo $row['solusi']; ?></td>
						<td><?php echo $row['nama_kerusakan']; ?></td>
						<td><a href=<?php echo base_url().'solusi/delete/'.$row['id_solusi'];?>><span class="badge bg-red">Delete</span></a></td>
						</tr>
				 <?php endforeach ?>
                <!-- </tr> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

