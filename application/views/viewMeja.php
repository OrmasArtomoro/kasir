<!DOCTYPE html>
<html>
<head>
	<style>
  .bts{
    background-color: green;
    color: white;
  }
  </style>
</head>
<body>
	<div style="padding-top: 50px">
  <br>
    <div class="container" style="padding-left: 105px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('welcome','Beranda'); ?></li>
      <li>Meja</li>
      </ul>
          <!-- <?php if($this->session->flashdata('notif_reservasi_buat')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_buat').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_reservasi_edit')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_edit').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_reservasi_hapus')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_hapus').'</div>'; ?>
          <?php endif; ?> -->
    </div>
	   <center> 
     <h1>List Meja</h1><br> 
     </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">

          <?php echo anchor('ctrMeja/tambah','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">
            <br>          
            <table id="myTable" class="display" border="1">
                <thead>
                	<th>Id Meja</th>
                    <th>No Meja</th>
                    <th>Jumlah Kursi</th>
                  	<th>Status</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                        <?php
                        $b = 1;
                        foreach($meja as $i):
                        ?>
                  <tr> 
                        <td><?php echo $b++; ?></td>
                        <td><?php echo $i->no_meja;?></td>
                        <td><?php echo $i->jumlah_kursi;?></td>
                        <td><?php 
                        if($i->status == 'Disetujui'){
                        echo "<p id='text1'><b>".$i->status."</b></h3>"; }
                        else {
                          echo "<p id='text2'><b>".$i->status."</b></h3>";
                          } ?>
                          </td>
                        <td>
                          <?php echo anchor('ctrMeja/edit/'.$i->id_meja,'Edit', array('class' => 'btn btn-sm btn-info')); ?>
                          <button location.href="" class='btn btn-sm btn-danger' onClick='ConfirmDelete()'>Delete</button>
                        </td>
                  </tr>
                  <?php endforeach;?>
            </tbody>
        </table>
    </div>

<script>
function ConfirmDelete()
      {
            if (confirm("Hapus Meja?"))
                 location.href='ctrMeja/delete/<?php echo $i->id_meja?>';
            else
                 location.href='ctrMeja';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>