<?php
class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login'))
            redirect('user/login');

        $this->load->model('data_model');
    }

    public function index()
    {
        $limit = 50;

        $data['title'] = 'Data';
        $data['offset'] = $this->input->get('per_page');
        $data['rows'] = $this->data_model->tampil($this->input->get('search'), false, $limit, $data['offset']);
        $data['total_rows'] =   $this->data_model->tampil($this->input->get('search'), true);

        $data['paging'] = get_paging('data', $data['total_rows'], $limit);
        load_view('data/tampil', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_transaksi', 'No Transaksi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('item', 'Item', 'required');

        $data['title'] = 'Tambah data';

        if ($this->form_validation->run() === FALSE) {
            load_view('data/tambah', $data);
        } else {
            $fields = array(
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'item' => $this->input->post('item'),
            );
            $this->data_model->tambah($fields);
            redirect('data');
        }
    }

    public function ubah($ID = null)
    {
        $this->form_validation->set_rules('no_transaksi', 'No Transaksi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('item', 'Item', 'required');

        $data['title'] = 'Ubah data';

        if ($this->form_validation->run() === FALSE) {
            $data['row'] = $this->data_model->get_data($ID);
            load_view('data/ubah', $data);
        } else {
            $fields = array(
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'item' => $this->input->post('item'),
            );
            $this->data_model->ubah($fields, $ID);
            redirect('data');
        }
    }

    public function hapus($ID = null)
    {
        $this->data_model->hapus($ID);
        redirect('data');
    }

    public function import()
    {
        if ($this->input->post('simpan')) {

            $data = array();

            $config['allowed_types'] = 'csv';
            $config['max_size']  = '2048';


            $this->load->helper('file');
            $this->load->library('upload', $config);
            $this->load->library('csvimport', $config);

            $lokasi = $config['upload_path'] = 'assets/csv/';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('data')) {
                set_msg('Gagal upload file', 'danger');
            } else {
                $uploadData = $this->upload->data();
                $filename = $lokasi . $uploadData['file_name'];
                $csv_array = $this->csvimport->get_array($filename, array('id_transaksi', 'no_transaksi', 'tanggal', 'item'), FALSE);

                if (!empty($csv_array)) {
                    $row_data = array();
                    foreach ($csv_array as $row) {
                        $date = date_create($row['tanggal'], timezone_open("Europe/Oslo"));
                        $row_data[] = array(
                            'no_transaksi' => $row['no_transaksi'],
                            'tanggal' => date_format($date, "Y-m-d"),
                            'item' => $row['item'],
                        );
                    }
                    $this->db->query("TRUNCATE tb_data");
                    $this->db->insert_batch('tb_data', $row_data);
                    set_msg("Data Dari <b>$uploadData[file_name]</b> Berhasil Disimpan Di Database", 'success');
                } else {
                    set_msg("<p>Terdapat Baris Pada CSV Kosong<p/>", 'danger');
                }
            }
        }
        $data['title'] = 'Import Data';
        load_view('data/import', $data);
    }
}
