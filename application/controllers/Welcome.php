<?php
header('Access-Control-Allow-Origin: *');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
  {
    parent::__construct();
		$this->load->database();
        $this->load->library('session');
if (empty($this->session->userdata('USER_ID')) ) {
           // $this->postal->add('You are not allowed to visit the Users page','error');
               redirect('login');
        }

  }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function index()
 	{
 		$data['page_title'] = "Welcome-Q2R";
		$data['page_description'] = "Q2R Prospective Employee Practical Assessment Project";

		$this->load->model('Quiz_model', 'QuizModel');
		$this->result['questions']=  $this->QuizModel->getQuestions();
 		$this->load->view('_Layout/home/header.php', $data); // Header File
 		$this->load->view('welcome_message', $this->result); // Main File (Body)
 		$this->load->view('_Layout/home/footer.php'); // Footer File
 	}
}
