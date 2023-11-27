<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classes extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Class Management';

        $query = "SELECT `classes`.*, `teachers`.`name` AS `homeroom_teacher` FROM `classes` JOIN `teachers` ON `classes`.`homeroom_teacher_id` = `teachers`.`id`";

        $data['class'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('classes/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('homeroom_teacher_id', 'Homeroom Teacher', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Class';

            $data['teacher'] = $this->db->get('teachers')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('classes/add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'homeroom_teacher_id' => $this->input->post('homeroom_teacher_id')
            ];

            $this->db->insert('classes', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New class added!</div>');

            redirect('classes');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");
        $this->form_validation->set_rules('homeroom_teacher_id', 'Homeroom Teacher', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Class';

            $data['class'] = $this->db->get_where('classes', ['id' => $id])->row_array();

            $data['teacher'] = $this->db->get('teachers')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('classes/edit', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'homeroom_teacher_id' => $this->input->post('homeroom_teacher_id')
            ];

            $this->db->where('id', $id);
            $this->db->update('classes', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Class updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Class not updated!</div>');
            }

            redirect('classes');
        }
    }

    public function delete($id)
    {
        $this->db->delete('classes', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Class deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Class not found!</div>');
        }

        redirect('classes');
    }
}
