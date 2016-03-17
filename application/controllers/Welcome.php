<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->model('welcome_model', 'model', TRUE);
		$this->load->helper(['form', 'url']);
	}

	public function index()
	{
		$this->load->view('welcome_message', [
			'images' => $this->model->all(),
			'notification' => $this->session->flashdata('notification')
		]);
	}

	public function delete($id)
	{
		if ($this->model->destroy($id))
		{
			$notification = '<div class="alert alert-success">Success to delete image.</div>';
		} else {
			$notification = '<div class="alert alert-danger">Fail to delete image.</div>';
		}

		$this->session->set_flashdata('notification', $notification);

		redirect(site_url('/'), 'refresh');
	}

	public function get_image($id)
	{
		header('Content-type : image/jpeg');

		echo $this->model->get($id);
	}

	public function upload()
	{
		$this->model->title = $_FILES['userfile']['name'];
		$this->model->image = file_get_contents($_FILES['userfile']['tmp_name']);

		if ($this->model->store() === TRUE) {
			$notification = '<div class="alert alert-success">Success uploading <strong>'. $_FILES['userfile']['name'] . '</strong> to DB.</div>';
		} else {
			$notification = '<div class="alert alert-danger">Failed uploading image.</div>';
		}

		$this->session->set_flashdata('notification', $notification);

		redirect(site_url('/'), 'refresh');
	}
}
