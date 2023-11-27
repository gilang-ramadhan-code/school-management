<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Student Management';

        $query = "SELECT `students`.*, `classes`.`name` AS `class` FROM `students` JOIN `classes` ON `students`.`class_id` = `classes`.`id`";

        $data['student'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('students/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', "required|trim");
        $this->form_validation->set_rules('address', 'Address', "required|trim");
        $this->form_validation->set_rules('class_id', 'Class', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Student';

            $data['class'] = $this->db->get('classes')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('students/add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'class_id' => $this->input->post('class_id')
            ];

            $this->db->insert('students', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New student added!</div>');

            redirect('students');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', "required|trim");
        $this->form_validation->set_rules('address', 'Address', "required|trim");
        $this->form_validation->set_rules('class_id', 'Class', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Student';

            $data['student'] = $this->db->get_where('students', ['id' => $id])->row_array();

            $data['class'] = $this->db->get('classes')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('students/edit', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'class_id' => $this->input->post('class_id')
            ];

            $this->db->where('id', $id);
            $this->db->update('students', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Student updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Student not updated!</div>');
            }

            redirect('students');
        }
    }

    public function delete($id)
    {
        $this->db->delete('students', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Student deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Student not found!</div>');
        }

        redirect('students');
    }
}
