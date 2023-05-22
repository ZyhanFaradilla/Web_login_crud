<?php
class Data_model extends CI_Model
{

    public function tampil($search = '', $count = false, $limit = 18446744073709551615, $offset = 0)
    {
        $this->db->like('item', $search . '');

        if ($count) {
            $this->db->from('tb_data');
            return $this->db->count_all_results();
        } else {
            $this->db->order_by('id_data', 'DESC');
            return $this->db->get('tb_data', $limit, $offset)->result();
        }
    }

    public function get_data($id_data = null)
    {
        $query = $this->db->get_where('tb_data', array('id_data' => $id_data));
        return $query->row();
    }

    public function ubah($fields, $id_data)
    {
        $this->db->update('tb_data', $fields, array('id_data' => $id_data));
    }

    public function hapus($id_data)
    {
        $this->db->delete('tb_data', array('id_data' => $id_data));
    }

    public function get_relasi($min, $max)
    {
        $rows = $this->db->query("SELECT no_transaksi, item 
            FROM tb_data WHERE tanggal>='$min' AND tanggal<='$max' 
            ORDER BY tanggal, item")->result();

        $data = array();
        foreach ($rows as $row) {
            $data[$row->no_transaksi][$row->item] = $row->item;
        }
        return $data;
    }
    public function get_relasi_tanggal($min, $max)
    {
        $rows = $this->db->query("SELECT no_transaksi, tanggal 
            FROM tb_data WHERE tanggal>='$min' AND tanggal<='$max' 
            ORDER BY tanggal, item")->result();

        $arr = array();
        foreach ($rows as $row) {
            $arr[$row->no_transaksi] = $row->tanggal;
        }
        return $arr;
    }
    public function tambah($fields)
    {
        $this->db->insert('tb_data', $fields);
    }
}
