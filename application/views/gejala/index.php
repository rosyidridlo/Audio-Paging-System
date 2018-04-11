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
			  <h3 class="box-title">Data Gejala</h3>
			  <a href="<?php echo base_url('gejala/create');?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah</a>
			</div>
			<!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  	<th style="width: 10px">#</th>
                    <th>ID Gejala</th>
                    <th>Gejala</th>
                    <th>Action</th>
                </tr>
            <?php $no = 1 ?>
            <?php foreach($gejala as $row): ?>
              <tr>
                <td><?php echo $no++ ; ?></td>
                <td><a href=<?php echo base_url().'gejala/view/'.$row['id_gejala']; ?>><span class="badge bg-light-blue"><?php echo $row['id_gejala']; ?></span></a></td>
                <td><?php echo $row['gejala']; ?></td>
                <td><a href=<?php echo base_url().'gejala/delete/'.$row['id_gejala'];?>><span class="badge bg-red">Delete</span></a></td>
              </tr>
            <?php endforeach ?>
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