<?php
class Tokosepatu extends CI_Controller
{
	public function index()

	{
		$this->load->view('view-form-tokosepatu');
	}

	public function cetak()
	{
		 $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required|min_length[3]',[
		      'required' => 'Nama Harus diisi', 
		      'min_length' => 'Nama terlalu pendek'       
		      ]); 
 
        $this->form_validation->set_rules('nohp', 'No HP', 'required|numeric',[
		      'required' => 'No HP Harus diisi', 
		      'numeric' => 'No Hp Harus Berupa Angka'         
        	]); 
                $this->form_validation->set_rules('merk', 'Merk Sepatu', 'required',[
		      'required' => 'Merk Harus diisi',           
        	]);
        	        $this->form_validation->set_rules('ukuran', 'Ukuran Sepatu', 'required|numeric',[
		      'required' => 'Ukuran Harus diisi', 
		      'numeric' => 'Harus berupa angka'                  
        	]);  

 
        if ($this->form_validation->run() != true) {             
        	$this->load->view('view-form-tokosepatu');         
        } else {             
        	$data = [                
        		'nama' => $this->input->post('nama'),
        		'nohp' => $this->input->post('nohp'), 
        		'merk' => $this->input->post('merk'), 
        		'ukuran' => $this->input->post('ukuran'), 
        		'harga' => $this->input->post('harga'), 
		 	];   

		 	if ($this->input->post('merk') == "Nike"){
			$data['harga'] = 375000;
		}elseif ($this->input->post('merk') == "Adidas"){
			$data['harga'] = 300000;
		}elseif ($this->input->post('merk') == "Kickers"){
			$data['harga'] = 250000;
		}elseif ($this->input->post('merk') == "Eiger"){
			$data['harga'] = 275000;
		}elseif ($this->input->post('merk') == "Bucherri"){
			$data['harga'] = 400000;
		}         

		$this->load->view('view-data-tokosepatu', $data);
		}
	}

}