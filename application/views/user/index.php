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
			  <h3 class="box-title">Data Pengguna</h3>
			  <a href="<?php echo base_url('user/create');?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                	<th>ID</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>E-Mail</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Gender</th>
                  <th>No Telp</th>
                  <th>Action</th>
                </tr>
                <!-- <tr> -->
					<?php $no = 1 ?>
                  <?php foreach($user as $row): ?>
					<tr>
						<td><?php echo $no++ ; ?></td>
						<td><a href=<?php echo base_url().'user/view/'.$row['id_user']; ?>><span class="badge bg-light-blue"><?php echo $row['id_user']; ?></span></a></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['alamat']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['no_telp']; ?></td>
						<td><a href=<?php echo base_url().'user/delete/'.$row['id_user'];?>><span class="badge bg-red">Delete</span></a></td>
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
