<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    /**
     * User Registration
     */
    public function registration()
    {
      $data['page_title'] = "Register-Q2R";
      $data['page_description'] = "Register Q2R Prospective Employee Practical Assessment Project";

        $this->form_validation->set_rules('full_name', 'Full Name', 'required|is_unique[students.reg_id]', [
            'is_unique' => 'The %s already exists. Please use a different Name',
        ]); // Unique Field
            $this->form_validation->set_rules('studentreg', 'Registration Id', 'required|min_length[6]|max_length[6]|is_unique[students.reg_id]', [
                'is_unique' => 'The %s already exists. Please use a different Registration Id',
            ]); // Unique Field


        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('_Layout/login/header.php', $data); // Header File
            $this->load->view("user/registration");
            $this->load->view('_Layout/login/footer.php'); // Footer File
        }
        else
        {
            $insert_data = array(
                'display_name' => $this->input->post('full_name', TRUE),
                'reg_id' => $this->input->post('studentreg', TRUE),

            );

            /**
             * Load User Model
             */
            $this->load->model('User_model', 'UserModel');
            $result = $this->UserModel->insert_user($insert_data);

            if ($result == TRUE) {

                $this->session->set_flashdata('success_flashData', 'You have registered successfully.');
                redirect('login');

            } else {

                $this->session->set_flashdata('error_flashData', 'Invalid Registration.');
                redirect('registration');

            }
        }
    }

    /**
     * User Login
     */
	public function login()
	{
    $data['page_title'] = "Login-Q2R";
    $data['page_description'] = "Login Q2R Prospective Employee Practical Assessment Project";

        $this->form_validation->set_rules('studentreg', 'Registration Id', 'required|min_length[6]|max_length[6]');


        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('_Layout/login/header.php', $data); // Header File
            $this->load->view("user/login");
            $this->load->view('_Layout/login/footer.php'); // Footer File
        }
        else
        {
            $login_data = array(
                'reg_id' => $this->input->post('studentreg', TRUE),
            );

            /**
             * Load User Model
             */
            $this->load->model('User_model', 'UserModel');
            $result = $this->UserModel->check_login($login_data);

            if (!empty($result['status']) && $result['status'] === TRUE) {

                /**
                 * Create Session
                 * -----------------
                 * First Load Session Library
                 */
                $session_array = array(
                    'USER_ID'  => $result['data']->id,
                    'USER_NAME'  => $result['data']->fullname,
                    'USERNAME'  => $result['data']->username,
                    'USER_EMAIL' => $result['data']->email,
                    'IS_ACTIVE'  => $result['data']->is_active,
                );

                $this->session->set_userdata($session_array);

                $this->session->set_flashdata('success_flashData', 'Login Success');
                redirect('/');

            } else {

                $this->session->set_flashdata('error_flashData', ''.$result['data'].'Invalid Registration Id.');
                redirect('login');
            }
        }
    }

    /**
     * User Logout
     */
    public function logout() {

        /**
         * Remove Session Data
         */
        $remove_sessions = array('USER_ID', 'USERNAME','USER_EMAIL','IS_ACTIVE', 'USER_NAME');
        $this->session->unset_userdata($remove_sessions);

        redirect('login');
    }


}
