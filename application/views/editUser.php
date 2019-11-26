<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($user as $key): ?>
      <?php echo form_open('ctrUser/editUser'.$key->id_user, array('enctype'=>'multipart/form-data')); ?>

      <div class="container" style="padding-top: 80px; text-align: center;">
        <div style="padding-left: 100px;">
          <ul class="breadcrumb">
          <li><?php echo anchor('welcome','Beranda'); ?></li>
          <li><?php echo anchor('ctrUser','User'); ?></li>
          <li>Edit User</li>
        </ul>
        </div>
        <h1>Edit User</h1>
      </div>>

      <div style="padding-top: 100px; padding-left: 250px">

      	<table>
        <input type="hidden" class="form-control" name="id_user" readonly value="<?php echo $key->id_user; ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo $key->nama; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="<?php echo $key->email; ?>">
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="<?php echo $key->username; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Level User</label>
          <div class="col-sm-10">
            <select name="level" class="form-control" required="required">
                                            <option value="1">Super User (Admin)</option>
                                            <option value="2">User</option>
            </select>
          </div>
        </div>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="edit" value="Edit" class="btn btn-primary">
          <?php echo anchor('ctrUser','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
      </table>
      	
      </div>
      <?php endforeach;?>

</body>
</html>