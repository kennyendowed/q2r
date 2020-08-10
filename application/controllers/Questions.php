<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
			$this->load->model('Quiz_model', 'QuizModel');
		$this->load->library('session');
if (empty($this->session->userdata('USER_ID')) ) {
			 // $this->postal->add('You are not allowed to visit the Users page','error');
					 redirect('login');
		}
	}

		public function resultdisplay()
	{
		$data['page_title'] = "Results-Q2R";
		$data['page_description'] = "Final Results for Q2R Prospective Employee Practical Assessment Project";
$result= $this->QuizModel->checklist($this->session->userdata('USER_ID'));//Call the modal

		    if (!empty($result['status']) && $result['status'] === TRUE) {

					$i=1;
					while(isset($_POST['question'.$i]))
					{
						 $answer = $_POST['question'.$i];
						 	 $question_id = $_POST['id_quest'.$i];
					 // echo "<pre>"; print_r($answer) ; echo "</pre>";
					 // echo "<pre>"; print_r($question_id) ; echo "</pre>";


					 	$insert_data = array(
					 			'qid' => $question_id,
					 			'answer' =>$answer,
								'student_id'=>$this->session->userdata('USER_ID'),
					 	);
$this->QuizModel->delete_records($this->session->userdata('USER_ID'));
 	// $this->QuizModel->multisave($insert_data);//Call the modal
		//			 $this->QuizModel->update($this->session->userdata('USER_ID'),$insert_data);//Call the modal
						 $i++;
					}

				}

				$result= $this->QuizModel->checklist($this->session->userdata('USER_ID'));//Call the modal

						    if (empty($result['status']) && $result['status'] === FALSE) {

									$i=1;
									while(isset($_POST['question'.$i]))
									{
										 $answer = $_POST['question'.$i];
										 	 $question_id = $_POST['id_quest'.$i];
									 // echo "<pre>"; print_r($answer) ; echo "</pre>";
									 // echo "<pre>"; print_r($question_id) ; echo "</pre>";


									 	$insert_data = array(
									 			'qid' => $question_id,
									 			'answer' =>$answer,
												'student_id'=>$this->session->userdata('USER_ID'),
									 	);
			//	$this->QuizModel->delete_records($this->session->userdata('USER_ID'));
				  $this->QuizModel->multisave($insert_data);//Call the modal
								//	 $this->QuizModel->update($this->session->userdata('USER_ID'),$insert_data);//Call the modal
										 $i++;
									}

								}
				// else {
				// 	$i=1;
				// 	while(isset($_POST['question'.$i]))
				// 	{
				// 		 $answer = $_POST['question'.$i];
				// 		 	 $question_id = $_POST['id_quest'.$i];
				//
				// 	 	$insert_data = array(
				// 	 			'qid' => $question_id,
				// 	 			'answer' =>$answer,
				// 				'student_id'=>$this->session->userdata('USER_ID'),
				// 	 	);
				//
				// 	 $this->QuizModel->multisave($insert_data);//Call the modal
				// 		 $i++;
				// 	}
				// }

		$this->data['checks'] = array(
		     'ques1' => $this->input->post('question1'),
		     'ques2' => $this->input->post('question2'),
			 'ques3' => $this->input->post('question3'),
			 'ques4' => $this->input->post('question4'),
		     'ques5' => $this->input->post('question5'),
			 'ques6' => $this->input->post('question6'),
			 'ques7' => $this->input->post('question7'),
			 'ques8' => $this->input->post('question8'),
		     'ques9' => $this->input->post('question9'),
			 'ques10' => $this->input->post('question10'),
		);

			$this->data['results']=  $this->QuizModel->getQuestionsbyid($this->session->userdata('USER_ID'));
		$this->load->view('_Layout/home/header.php', $data); // Header File
		$this->load->view('user/result_display', $this->data);// Main File (Body)
		$this->load->view('_Layout/home/footer.php'); // Footer File
	}
}
