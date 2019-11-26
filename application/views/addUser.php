<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div style="padding-left: 200px">
  <div class="container">
  
    <?php echo validation_errors(); ?>
      <?php
        echo form_open_multipart('ctrUser/tbhUser', array('class'=>'needs-validation', 'novalidate'=>''));
       ?>


<center> <h2> FORM TAMBAH ANGGOTA </h2> </center>
       <br>
      <table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
           
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ?>" required>
           </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" required>
           </div>
        </div>
        <br>
  <label class="col-sm-2 col-sm-2 control-label">Password</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
  </div>
 </div>
 <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Level User</label>
          <div class="col-sm-10">
            <select name="level" class="form-control" required="required">
                                            <option value="1">Super User (Admin)</option>
                                            <option value="2">Kasir</option>
            </select>
          </div>
        </div>
     </div>
     <br><br>
 <div class="form-group">
          <td colspan="3"><input id="submitBtn" type="submit" name="simpan" value="simpan"></td>
        </table>
      </div>
</div>
</body>
</html>