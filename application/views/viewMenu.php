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
      <li>Menu</li>
    </ul>
          <!-- <?php if($this->session->flashdata('notif_user_buat')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_buat').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_user_edit')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_edit').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_user_hapus')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_hapus').'</div>'; ?>
          <?php endif; ?> -->
    </div>
	  <center> 
        <h1>List Menu</h1><br> 
    </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">
        	<?php echo anchor('ctrMenu/create','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">          
            <br>
            <table id="myTable" class="display" border="1">
                <thead>
                    <th>Id Makanan</th>
                    <th>Nama Makanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                        $b = 1;
                        foreach($data as $i):
                        ?>
                  <tr>
                        <td><?php echo $b++; ?></td>
                        <td><?php echo $i->nama_menu;?> </td>
                        <td><?php echo $i->deskripsi;?> </td>
                        <td><?php echo $i->harga;?></td>
                        <td><img src="<?php echo base_url() .'uploads/'. $i->gambar ?>" width="50"></td>
                        <td>
                          <?php echo anchor('ctrMenu/edit/'.$i->id_menu,'Edit Data', array('class' => 'btn btn-sm btn-info')); ?>
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
            if (confirm("Hapus Menu?"))
                 location.href='ctrMenu/delete/<?php echo $i->id_menu?>';
            else
                 location.href='ctrMenu';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>