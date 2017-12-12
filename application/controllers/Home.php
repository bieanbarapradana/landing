<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

	{
			
		
		parent::__construct();
		
		$this->load->model('homeModel','homeModel');
		

		/*if (!$this->session->userdata('login_in')) 

		{

			redirect(base_url(''));

		}

		else

		{



		}*/

	}

	function _render_page($view, $data=null)

	{	
		
		$this->viewdata = (empty($data)) ? $this->data: $data;

		$this->load->view('front-end/home/include/header',$this->viewdata);

		$view_html = $this->load->view($view);

		$this->load->view('front-end/home/include/footer');

	}

	function index()

	{

		$this->data['add_css'] = array(

			base_url('assets/front-end/vendors/bootstrap/bootstrap.min.css'),
			base_url('assets/front-end/vendors/animate/animate.min.css'),
			base_url('assets/front-end/assets/fonts/wolverine/styles.css'),
			base_url('assets/front-end/maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'),
			base_url('assets/front-end/vendors/slick/slick.css'),
			base_url('assets/front-end/vendors/full-page/jquery.fullPage.css'),
			base_url('assets/front-end/assets/css/main.css'),

		);

		$this->data['add_js'] = array(

			base_url('assets/front-end/vendors/jquery/jquery-1.11.2.min.js'),
			base_url('assets/front-end/vendors/stellar/jquery.stellar.min.js'),
			base_url('assets/front-end/vendors/smooth-scroll/SmoothScroll.js'),
			base_url('assets/front-end/vendors/magnific-popup/jquery.magnific-popup.js'),
			base_url('assets/front-end/vendors/isotope/isotope.pkgd.min.js'),
			base_url('assets/front-end/vendors/isotope/packery-mode.pkgd.min.js'),
			base_url('assets/front-end/vendors/img-loaded/imagesloaded.pkgd.min.js'),
			base_url('assets/front-end/assets/js/main.js'),

		);

		$this->data['data_kategori'] = $this->homeModel->data_kategori()->result();
		
		$this->data['data_beranda'] = $this->homeModel->data_beranda()->result();

		$this->_render_page('front-end/home/contentHome');		
	}
	
	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" class="data-check" value="'.$person->id.'">';
			$row[] = $person->firstName;
			$row[] = $person->lastName;
			$row[] = $person->gender;
			$row[] = $person->address;
			$row[] = $person->dob;
			if($person->photo)
				$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

		$insert = $this->person->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$person = $this->person->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$person->photo) && $person->photo)
				unlink('upload/'.$person->photo);

			$data['photo'] = $upload;
		}

		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$person = $this->person->get_by_id($id);
		if(file_exists('upload/'.$person->photo) && $person->photo)
			unlink('upload/'.$person->photo);
		
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
	
	public function ajax_bulk_delete()
	{
		$list_id = $this->input->post('id');
		foreach ($list_id as $id) {
			$this->person->delete_by_id($id);
		}
		echo json_encode(array("status" => TRUE));
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

