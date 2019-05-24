<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('tb_supir');
    	$this->template->admin('admin/isi_datasupir', $data);
    }


	public function tambah_supir()
	{

if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'foto'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

	//check foto
	    if (!$this->upload->do_upload('foto')) {
		   	 	$error = array('error' => $this->upload->display_errors());
		    	$this->session->set_flashdata('error',$error['error']);
		    	redirect(current_url());
		}else {

		};
     //end check foto

			if ($this->upload->do_upload('foto')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$datauser = array (
				'nama_supir' => $this->input->post('nama_supir', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'no_ktp' => $this->input->post('no_ktp', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
				'umur' => $this->input->post('umur', TRUE),
				'foto' => $gbr['file_name']


			);
				$this->db->set('created', 'NOW()', FALSE);
				$this->app_admin->insert('tb_supir', $datauser);

				$this->session->set_flashdata('success', 'Sopi Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

				$data['nama_supir'] = $this->input->post('nama_supir', TRUE);
				$data['nik'] = $this->input->post('nik', TRUE);
				$data['no_ktp'] = $this->input->post('no_ktp', TRUE);
				$data['no_hp'] = $this->input->post('no_hp', TRUE);
				$data['jenis_kelamin'] = $this->input->post('jenis_kelamin', TRUE);
				$data['alamat'] = $this->input->post('alamat', TRUE);
				$data['tgl_lahir'] = $this->input->post('tgl_lahir', TRUE);
				$data['umur'] = $this->input->post('umur', TRUE);


		$data['header_tambahsupir'] = "Tambah supir Baru";

		$this->template->admin('admin/form_tambahsupir', $data);
	}

	
	public function detail()
	{
		$id_supir = $this->uri->segment(3);

		$supir = $this->app_admin->get_where('tb_supir', array('id_supir' => $id_supir));

		foreach ($supir->result() as $tampil) 
		{
			$data['id_supir'] = $tampil->id_supir;
			$data['nama_supir'] = $tampil->nama_supir;
			$data['nik'] = $tampil->nik;
			$data['no_ktp'] = $tampil->no_ktp;
			$data['no_hp'] = $tampil->no_hp;
			$data['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['alamat'] = $tampil->alamat;
			$data['tgl_lahir'] = $tampil->tgl_lahir;
			$data['umur'] = $tampil->umur;
			$data['foto'] = $tampil->foto;
			$data['created'] = $tampil->created;


		}

		$this->template->admin('admin/isi_detailsupir', $data);
	}

	public function update_user()
	{
		$id_user = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{


			//insert

			$datauser = array (
				'username' => $this->input->post('username', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'status' => $this->input->post('status', TRUE)

			);

//proses upload-

				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');

		  $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('tb_user', $datauser, array('id_user' => $id_user));

		  $this->session->set_flashdata('success', 'Data User Telah Berhasil di ubah');
		  redirect(current_url());
		}

		

		$user = $this->app_admin->get_where('tb_user', array('id_user' => $id_user));

		foreach ($user->result() as $tampil) 
		{
			$data['id_user'] = $tampil->id_user;
			$data['username'] = $tampil->username;
			$data['nama'] = $tampil->nama;
			$data['nik'] = $tampil->nik;
			$data['email'] = $tampil->email;
			$data['no_hp'] = $tampil->no_hp;
			$data['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['alamat'] = $tampil->alamat;
			$data['status'] = $tampil->status;
			$data['created'] = $tampil->created;
			$data['last_login'] = $tampil->last_login;


		}

		$data['header_tambahsupir'] = "Update  User";

		$this->template->admin('admin/form_updateuser', $data);
	}

		function hapus($id){


		$where = array('id_user' => $id);


		$this->app_admin->hapus_data($where,'tb_user');


		$this->session->set_flashdata('success' ,'Data supir Berhasil di hapus');

		redirect('user');
	}

}