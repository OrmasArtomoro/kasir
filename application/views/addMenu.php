<!DOCTYPE html>
<html>
<head>
	<style>
  .text1 {
    color: red;
  }
  </style>
</head>
<body>

	<?php echo form_open('ctrMenu/create', array('class' => 'needs-validation', 'novalidate' => '', 'enctype'=>'multipart/form-data')); ?>

	<div class="container" style="padding-top: 80px; text-align: center;">
    <div style="padding-left: 100px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('welcome','Beranda'); ?></li>
      <li><?php echo anchor('ctrMenu','Menu'); ?></li>
      <li>Tambah Menu</li>
    </ul>
    </div>
		<h1>Tambah Menu</h1>
	</div>

	<div style="padding-top: 80px; padding-left: 250px">
		<table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_menu" value="<?php echo set_value('nama_menu'); ?>">
          </div>
        </div>
        <br><br>
        <div class="form-group">
      		<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
      		<div class="col-sm-10">
        	<input type="text" class="form-control" name="deskripsi">
      		</div>
		    </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Harga</label>
          <div class="col-sm-10">
          <textarea class="form-control" name="harga"></textarea>
          <br>
          </div>
        </div>
        <br><br>
        <br><br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Gambar Menu</label>
          <div class="col-sm-10">
          <input type="file" class="form-control" name="gambar" id="preview_gambar" >
          <img id="gambar_nodin" width="300">
          <p class="text1"><b>*Gambar Ekstensi .jpg/.jpeg/.png (max size 2MB)</b></p>
          </div>
        </div>
	       <br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="simpan" value="simpan" class="btn btn-primary">
          <?php echo anchor('admin/ruangan','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
    </table>

        <?php echo form_close(); ?>

      <script>
        function bacaGambar(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
         }
      }
      </script>
      <script>
        $("#preview_gambar").change(function(){
         bacaGambar(this);
      });
      </script>
</body>
</html>