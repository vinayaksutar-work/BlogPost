<?php

class Admin extends MY_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if($this->session->userdata('id'))
    //     return redirect('admin/welcome');
    // }
    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('admin');
    }
    public function index()
    {
        // $this->form_validation->set_rules('username', 'User Name','required|alpha');
        // $this->form_validation->set_rules('password', 'Password','required|max_length[12]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

        if($this->form_validation->run('admin_login_rules'))
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $id = $this->loginmodel->isvalidate($username, $password);
            if($id)
            {
                $this->session->set_userdata('id', $id);
                return redirect('admin/welcome');
            }
            else
            {
                $this->session->set_flashdata('Login_failed', 'Invalid Username/Password');
                return redirect('admin');
            }
        }
        else
        {
            $this->load->view('admin/loginpage');
        }
    }
    public function welcome()
    {
        $articles = $this->loginmodel->articleList();
        $this->load->view('admin/dashboard',['articles' => $articles]);
    }
    public function adduser()
    {
        $this->load->view('admin/addarticle');
        // $this->input->post();
    }
    public function userValidation()
    {
        if($this->form_validation->run('add_article_rules') == FALSE)
        {
            $this->loginmodel->addArticles();
            if($this->form_validation->run('add_article_rules'))
            {
                echo "Insert article";
            }
            else{
                $this->load->view('admin/addarticle');
            }
        }
        else
        {
            $this->load->view('admin/addarticle');
        }
    }
    public function edituser()
    {

    }
    public function deleteuser()
    {

    }
    public function register()
    {
        $this->load->view('admin/register');
    }
    public function sendmail()
    {
        $this->form_validation->set_rules('username', 'UserName','required|alpha');
        $this->form_validation->set_rules('password', 'Password','required|max_length[12]');
        $this->form_validation->set_rules('firstname', 'FirstName','required|alpha');
        $this->form_validation->set_rules('lastname', 'LastName','required|alpha');
        $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

        if($this->form_validation->run())
        {
            $this->email->from(set_value('email'),set_value('firstname'));
            $this->email->to('vinayaksutar.work@gmail.com');
            $this->email->subject('Registration Greetings');
            $this->email->message('Thank you for registering');
            $this->email->set_newline("\r\n");
            $this->email->send();

            if(!$this->email->send())
            {
                show_error($this->email->print_debugger());
            }
            else{
                "Your email has been sent successfully";
            }
        }
        else{
            $this->load->view('admin/register');
        }

    }
}
?>