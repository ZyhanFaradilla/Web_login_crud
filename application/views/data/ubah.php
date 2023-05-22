<div class="row">
    <div class="col-md-6">
        <?=print_error()?>
        <form method="post">
            <div class="form-group">
                <label>No Transaksi</label>
                <input class="form-control" type="text" name="no_transaksi" value="<?=set_value('no_transaksi', $row->no_transaksi)?>" />
            </div>
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?=set_value('tanggal', $row->tanggal)?>" />
            </div>
            <div class="form-group">
                <label>Item</label>
                <input class="form-control" type="text" name="item" value="<?=set_value('item', $row->item)?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('dosen')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>