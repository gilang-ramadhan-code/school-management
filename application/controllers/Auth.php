<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', "required|trim|valid_email");
        $this->form_validation->set_rules('password', 'Password', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Login';

            $this->load->view('auth/login', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = ['email' => $user['email']];

                    $this->session->set_userdata($data);

                    redirect('auth/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');

                redirect('auth');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('email', 'Email', "required|trim|valid_email|is_unique[users.email]", ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password', 'Password', "required|trim|min_length[3]|matches[repeat_password]", ['matches' => 'Password dont match!', 'min_length' => 'Password too short']);
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', "required|trim");

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';

            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
            ];

            $this->db->insert('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');

        redirect('auth');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('auth/index', $data);
    }
}
