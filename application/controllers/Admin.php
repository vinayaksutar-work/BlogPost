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
            echo "Validation Success !!";
        }
        else
        {
            $this->load->view('Users/articlelist');
        }
    }
}
?>