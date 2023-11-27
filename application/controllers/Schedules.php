<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedules extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Schedule Management';

        $query = "SELECT `schedules`.*, `classes`.`name` AS `class`, `subjects`.`name` AS `subject`, `teachers`.`name` AS `teacher` FROM `schedules` JOIN `classes` ON `schedules`.`class_id` = `classes`.`id` JOIN `subjects` ON `schedules`.`subject_id` = `subjects`.`id` JOIN `teachers` ON `schedules`.`teacher_id` = `teachers`.`id`";

        $data['schedule'] = $this->db->query($query)->result_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('schedules/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('day', 'Day', "required|trim");
        $this->form_validation->set_rules('start_time', 'Start Time', "required|trim");
        $this->form_validation->set_rules('finish_time', 'Finish Time', "required|trim");
        $this->form_validation->set_rules('class_id', 'Class', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");
        $this->form_validation->set_rules('teacher_id', 'Teacher', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Add New Schedule';

            $data['day'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            $data['class'] = $this->db->get('classes')->result_array();
            $data['subject'] = $this->db->get('subjects')->result_array();
            $data['teacher'] = $this->db->get('teachers')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('schedules/add', $data);
        } else {
            $data = [
                'day' => $this->input->post('day'),
                'start_time' => $this->input->post('start_time'),
                'finish_time' => $this->input->post('finish_time'),
                'class_id' => $this->input->post('class_id'),
                'subject_id' => $this->input->post('subject_id'),
                'teacher_id' => $this->input->post('teacher_id')
            ];

            $this->db->insert('schedules', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New schedule added!</div>');

            redirect('schedules');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('day', 'Day', "required|trim");
        $this->form_validation->set_rules('start_time', 'Start Time', "required|trim");
        $this->form_validation->set_rules('finish_time', 'Finish Time', "required|trim");
        $this->form_validation->set_rules('class_id', 'Class', "required|trim");
        $this->form_validation->set_rules('subject_id', 'Subject', "required|trim");
        $this->form_validation->set_rules('teacher_id', 'Teacher', "required|trim");

        if (!$this->form_validation->run()) {
            $data['title'] = 'Edit Schedule';

            $data['schedule'] = $this->db->get_where('schedules', ['id' => $id])->row_array();

            $data['day'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            $data['class'] = $this->db->get('classes')->result_array();
            $data['subject'] = $this->db->get('subjects')->result_array();
            $data['teacher'] = $this->db->get('teachers')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('schedules/edit', $data);
        } else {
            $data = [
                'day' => $this->input->post('day'),
                'start_time' => $this->input->post('start_time'),
                'finish_time' => $this->input->post('finish_time'),
                'class_id' => $this->input->post('class_id'),
                'subject_id' => $this->input->post('subject_id'),
                'teacher_id' => $this->input->post('teacher_id')
            ];

            $this->db->where('id', $id);
            $this->db->update('schedules', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Schedule updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Schedule not updated!</div>');
            }

            redirect('schedules');
        }
    }

    public function delete($id)
    {
        $this->db->delete('schedules', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Schedule deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Schedule not found!</div>');
        }

        redirect('schedules');
    }
}
