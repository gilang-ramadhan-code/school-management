<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subjects extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Subject Management';

        $data['subject'] = $this->db->get('subjects')->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('subjects/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Subject';

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('subjects/add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name')
            ];

            $this->db->insert('subjects', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New subject added!</div>');

            redirect('subjects');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Subject';

            $data['subject'] = $this->db->get_where('subjects', ['id' => $id])->row_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('subjects/edit', $data);
        } else {
            $data = [
                'name' => $this->input->post('name')
            ];

            $this->db->where('id', $id);
            $this->db->update('subjects', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subject updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Subject not updated!</div>');
            }

            redirect('subjects');
        }
    }

    public function delete($id)
    {
        $this->db->delete('subjects', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subject deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Subject not found!</div>');
        }

        redirect('subjects');
    }
}
