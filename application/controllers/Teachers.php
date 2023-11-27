<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teachers extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Teacher Management';

        $query = "SELECT `teachers`.*, `subjects`.`name` AS `subject` FROM `teachers` JOIN `subjects` ON `teachers`.`subject_id` = `subjects`.`id`";

        $data['teacher'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('teachers/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', "required|trim");
        $this->form_validation->set_rules('address', 'Address', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Teacher';

            $data['subject'] = $this->db->get('subjects')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('teachers/add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'subject_id' => $this->input->post('subject_id')
            ];

            $this->db->insert('teachers', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New teacher added!</div>');

            redirect('teachers');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', "required|trim");
        $this->form_validation->set_rules('address', 'Address', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Teacher';

            $data['teacher'] = $this->db->get_where('teachers', ['id' => $id])->row_array();

            $data['subject'] = $this->db->get('subjects')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('teachers/edit', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'subject_id' => $this->input->post('subject_id')
            ];

            $this->db->where('id', $id);
            $this->db->update('teachers', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Teacher updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Teacher not updated!</div>');
            }

            redirect('teachers');
        }
    }

    public function delete($id)
    {
        $this->db->delete('teachers', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Teacher deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Teacher not found!</div>');
        }

        redirect('teachers');
    }
}
