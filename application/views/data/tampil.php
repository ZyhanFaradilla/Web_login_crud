<?=show_msg()?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?=$this->input->get('search')?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="<?=site_url('data/tambah')?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="<?=site_url('data/import')?>"><i class="glyphicon glyphicon-import"></i> Import</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NoTransaksi</th>
                <th>Tanggal</th>
                <th>Item</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php    
        $no=$offset;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no?></td>
            <td><?=$row->no_transaksi?></td>
            <td><?=$row->tanggal?></td>
            <td><?=$row->item?></td>
            <td>
                <a class="btn btn-xs btn-warning" href="<?=site_url("data/ubah/$row->id_data")?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="<?=site_url("data/hapus/$row->id_data")?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
    <div class="panel-footer clearfix">
        <span class="pull-left">Menampilkan <?=count($rows)?> dari <?=$total_rows?> data</span>
        <?=$paging?>
    </div>
</div>