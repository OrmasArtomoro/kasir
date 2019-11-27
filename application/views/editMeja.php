<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($data as $key): ?>
      <?php echo form_open('ctrMeja/edit/'.$key->id_meja, array('enctype'=>'multipart/form-data')); ?>

      <div class="container" style="padding-top: 80px; text-align: center;">
        <div style="padding-left: 100px;">
          <ul class="breadcrumb">
          <li><?php echo anchor('Welcome','Beranda'); ?></li>
          <li><?php echo anchor('ctrMeja','Reservasi'); ?></li>
          <li>Edit Meja</li>
        </ul>
        </div>
        <h1>Edit Meja</h1>
      </div>
      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">No Meja</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="no_meja" value="<?php echo $key->no_meja; ?>">
          </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Jumlah Kursi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="jumlah_kursi" value="<?php echo $key->jumlah_kursi; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select name="status" class="form-control" required="required">
              <option value="Available">Available</option>
              <option value="Booking  ">Booking </option>
            </select>
          </div>
        </div>
        <br></br>
          <div style="padding-top: 100px; padding-left: 250px">
          <input id="submitBtn" type="submit" name="edit" value="Edit" class="btn btn-primary">
          <?php echo anchor('ctrMeja','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
      </table>
      	
      </div>
      <?php endforeach;?>

</body>
</html>