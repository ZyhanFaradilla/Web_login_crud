<div class="panel panel-default">
    <div class="panel-heading">
        <?=form_open('user', array('class'=>'form-inline', 'method' => 'get'))?>
            <input class="form-control" name="search" value="<?=$this->input->get('search')?>" placeholder="Pencarian" />
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            <a class="btn btn-primary" href="<?=site_url('user/tambah')?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
        </form>        
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>User</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr></thead>    
            <?php 
            $no=1;
            foreach ($rows as $row):?>
            <tr>
                <td><?=$row->user?></td>
                <td><?=$row->userlevel?></td>                
                <td class="nw">
                    <a class="btn btn-xs btn-warning" href="<?=site_url('user/ubah/' . $row->uid)?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="<?=site_url('user/hapus/' . $row->uid)?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>