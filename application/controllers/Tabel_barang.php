<?php 
class Tabel_barang extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('tabel_barang_model','tabel');
        $this->load->library('form_validation');
        $this->load->model("excel_export_model");
    }
    function index(){
        $data['tabel_barang']=$this->tabel->get_all();
        $this->load->view('tabel_barang/index',$data);
    }
    function add(){
        $data= array(
            'action'=>site_url('tabel_barang/addsave'),
            'tombol'=>'Tambah',
            'kode_barang'=>set_value('kode_barang'),
            'jenis_barang'=>set_value('jenis_barang'),
            'merk'=>set_value('merk'),
            'model'=>set_value('model'),
            'warna'=>set_value('warna'),
            'serialnumber'=>set_value('serialnumber'),
            'gambar'=>set_value('gambar'),
            'deskripsi'=>set_value('deskripsi'),
            'status'=>set_value('status'),
            'lokasi'=>set_value('lokasi')
        );
        $this->load->view('tabel_barang/form',$data);
    }
    function addsave(){
        $post=$this->input->post();
        $this->_rules();
        if ($this->form_validation->run()== FALSE){
            $this->add();
        }else{
        $data=array(
            'kode_barang'=>$post['kode_barang'],
            'jenis_barang'=> $post['jenis_barang'],
            'merk'=>$post['merk'],
            'model'=> $post['model'],
            'warna'=>$post['warna'],
            'serialnumber'=> $post['serialnumber'],
            'gambar'=>$this->_uploadImage(),
            'deskripsi'=> $post['deskripsi'],
            'lokasi'=>$post['lokasi'],
            'status'=> $post['status'],
        );
        $this->tabel->insert($data);
        redirect('tabel_barang');
    }
}
     function update(){
        $kode=$this->uri->segment('3');
        $row=$this->tabel->getbyid($kode);
        if($row){
            $data=array (
                'action'=>site_url('tabel_barang/updatesave'),
                'tombol'=>'Ubah',
                'kode_barang'=>set_value('kode_barang',$row->kode_barang),
                'jenis_barang'=> set_value('jenis_barang',$row->jenis_barang),'merk'=>set_value('merk',$row->merk),'model'=>set_value('model',$row->model),'warna'=>set_value('warna',$row->warna),'serialnumber'=>set_value('serialnumber',$row->serialnumber),'gambar'=>set_value('gambar',$row->gambar),'deskripsi'=>set_value('deskripsi',$row->deskripsi),'status'=>set_value('status',$row->status),'lokasi'=>set_value('lokasi',$row->lokasi));
        }else{
            redirect('tabel_barang');
        }
        $this->load->view('tabel_barang/form',$data);
    }
     public function updatesave(){
        $data=array(
            'jenis_barang'=> $this->input->post('jenis_barang'),
            'merk'=>$this->input->post('merk'),
            'model'=> $this->input->post('model'),
            'warna'=>$this->input->post('warna'),
            'serialnumber'=> $this->input->post('serialnumber'),
            'gambar'=>$this->_uploadImage(),
             'deskripsi'=> $this->input->post('deskripsi'),
            'status'=>$this->input->post('status'),
             'lokasi'=> $this->input->post('lokasi'),);
        $this->tabel->update($id=$this->input->post('kode_barang',TRUE),$data);
        redirect('tabel_barang');
    }
    function delete(){
        $kode=$this->uri->segment('3');
       $this->tabel->delete($kode);
       redirect('tabel_barang');
    }

    public function _rules(){
        $valid=$this->form_validation;
        $valid->set_rules('jenis_barang', 'Jenis Barang', 'trim|required');
        $valid->set_rules('merk', 'Merk', 'trim|required');
        $valid->set_rules('model', 'Model', 'trim|required');
        $valid->set_rules('warna', 'Warna', 'trim|required');
        $valid->set_rules('serialnumber', 'Serial Number', 'trim|required');
        $valid->set_rules('gambar', 'Gambar', 'trim|required');
        $valid->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $valid->set_rules('status', 'Status', 'trim|required');
        $valid->set_rules('lokasi', 'Lokasi', 'trim|required');
        $valid->set_rules('kode_barang', 'Kode Barang', 'trim'); 
    }
     private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}

 ?>