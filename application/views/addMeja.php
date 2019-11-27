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
        echo form_open_multipart('ctrMeja/tambah', array('class'=>'needs-validation', 'novalidate'=>''));
       ?>


<center> <h2> FORM TAMBAH Meja </h2> </center>
       <br>
      <table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">No Meja</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="no_meja" value="<?php echo set_value('no_meja'); ?>" required>
           
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Jumlah Kursi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="jumlah_kursi" value="<?php echo set_value('jumlah_kursi') ?>" required>
           </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select name="status" class="form-control" required="required">
                                            <option value="available">Available</option>
                                            <option value="booking">Booking</option>
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