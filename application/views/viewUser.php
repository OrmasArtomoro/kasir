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
      <li>User</li>
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
        <h1>List User</h1><br> 
    </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">
        	<?php echo anchor('ctrUser/tbhUser','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">          
            <br>
            <table id="myTable" class="display" border="1">
                <thead>
                    <th>Nama</th>
                    <th>Email</th>
                  	<th>Username</th>
                  	<th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                  <?php
                        foreach($user as $i):
                              $id_user=$i['id_user'];
                              $nama=$i['nama'];
                              $email=$i['email'];
                              $username=$i['username'];
                              $password=$i['password'];
                              $level=$i['level'];
                        ?>
                  <tr>
                        <!-- <td><?php echo $id_user;?> </td> -->
                        <td><?php echo $nama;?> </td>
                        <td><?php echo $email;?> </td>
                        <td><?php echo $username;?> </td>
                        <td><?php echo $password;?> </td>
                        <td><?php echo $level;?> </td>
                        <td>
                          <a href='<?php echo base_url() ?>ctrUser/edit<?php echo $id_user ?>' class='btn btn-sm btn-info'>Update</a>
                          <a href='<?php echo base_url() ?>ctrUser/delete/<?php echo $id_user; ?>' class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                  </tr>
                  <?php endforeach;?>
            </tbody>
        </table>
    </div>

<script>
function ConfirmDelete()
      {
            if (confirm("Hapus User?"))
                 location.href='ctruser/delete/<?php echo $i->id_user?>';
            else
                 location.href='ctrUser';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>