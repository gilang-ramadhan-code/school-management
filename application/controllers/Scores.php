<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scores extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Score Management';

        $query = "SELECT `scores`.*, `students`.`name` AS `student`, `subjects`.`name` AS `subject` FROM `scores` JOIN `students` ON `scores`.`student_id` = `students`.`id` JOIN `subjects` ON `scores`.`subject_id` = `subjects`.`id`";

        $data['score'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('scores/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('student_id', 'Student', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");
        $this->form_validation->set_rules('score', 'Score', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Score';

            $data['student'] = $this->db->get('students')->result_array();
            $data['subject'] = $this->db->get('subjects')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('scores/add', $data);
        } else {
            $data = [
                'student_id' => $this->input->post('student_id'),
                'subject_id' => $this->input->post('subject_id'),
                'score' => $this->input->post('score')
            ];

            $this->db->insert('scores', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Score added!</div>');

            redirect('scores');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('student_id', 'Student', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");
        $this->form_validation->set_rules('score', 'Score', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Score';

            $data['score'] = $this->db->get_where('scores', ['id' => $id])->row_array();

            $data['student'] = $this->db->get('students')->result_array();
            $data['subject'] = $this->db->get('subjects')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('scores/edit', $data);
        } else {
            $data = [
                'student_id' => $this->input->post('student_id'),
                'subject_id' => $this->input->post('subject_id'),
                'score' => $this->input->post('score')
            ];

            $this->db->where('id', $id);
            $this->db->update('scores', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Score updated!</div>');

            redirect('scores');
        }
    }

    public function delete($id)
    {
        $this->db->delete('scores', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Score deleted!</div>');

        redirect('scores');
    }
}
