<?php

class Admin extends MY_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'User Name','required|alpha');
        $this->form_validation->set_rules('password', 'Password','required|max_length[12]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

        if($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $id = $this->loginmodel->isvalidate($username, $password);
            if($id)
            {
                $this->load->library('session');
                $this->session->set_userdata('id', $id);
                $this->load->view('admin/dashboard');
            }
            else
            {
                echo "Username & Password not matched.";
            }
        }
        else
        {
            $this->load->view('Admin/login');
        }
    }
}
?>