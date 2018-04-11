  <!-- Full Width Column -->
  <div class="content-wrapper" style="margin-top:-10px">
    <div class="container">
        <div class="box box-default">
          <div class="box-body" style="min-height: 600px">
            <table border="1">
				<tr>
					<th>Kerusakan</th>
					<th>Definisi</th>
					<th>Solusi</th>
				</tr>
			<?php foreach($kerusakan as $row): ?>
				<tr>
					<td><?php echo $row['nama_kerusakan']; ?></td>
					<td><?php echo $row['definisi']; ?></td>
					<td><?php echo $row['solusi']; ?></td>
				</tr>
			<?php endforeach ?>
			</table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
