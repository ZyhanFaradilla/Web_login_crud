<div class="row">
	<div class="col-md-6">
		<?=show_msg()?>
		<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="simpan" value="1">
		<div class="form-group">
	    	<input class="form-control" type="file" name="data" size="20">
		</div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('data')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div> 
		</form>
	</div>
</div>


