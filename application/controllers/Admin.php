<?php

class Admin extends MY_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if($this->session->userdata('id'))
    //     return redirect('admin/welcome');
    // }
    public function index()
    {
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

        if($this->form_validation->run('admin_login_rules'))
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $id = $this->loginmodel->is_login($username, $password);
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
        $config=[
            'base_url' => base_url('admin/welcome'),
            'per_page' =>4,
            'total_rows' =>$this->loginmodel->num_rows(),
            'full_tag_open' =>"<ul class='pagination'>",
            'full_tag_close' =>"</ul>",
            'next_tag_open' =>"<li>",
            'next_tag_close' =>"</li>",
            'prev_tag_open' =>"<li>",
            'prev_tag_close' =>"</li>",
            'num_tag_open' =>"<li>",
            'num_tag_close' =>"</li>",
            'current_tag_open' =>"<li class='active'><a>",
            'current_tag_close' =>"</a></li>"
        ];

        $this->pagination->initialize($config);

        $articles = $this->loginmodel->is_articlelist($config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/dashboard',['articles' => $articles]);
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        return redirect('admin');
    }
    public function adduser()
    {
        $this->load->view('admin/addarticle');
    }
    public function userValidation()
    {
        if($this->form_validation->run('add_article_rules'))
        {
            $this->loginmodel->is_addarticles();
            if($this->form_validation->run('add_article_rules'))
            {
                $this->session->set_flashdata('msg', 'Article added successfully !!!!');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            else{
                $this->session->set_flashdata('msg', 'Article not added, please try again.');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            return redirect('admin/welcome');
        }
        else
        {
            $this->load->view('admin/addarticle');
        }
    }
    public function editArticle($id)
    {
        $article = $this->loginmodel->is_editarticle($id);
        $this->load->view('admin/editarticle',['article' => $article]);
    }
    public function updateArticle($articleid)
    {
        if($this->form_validation->run('add_article_rules'))
        {
            $data = array(
                            'article_title' => $this->input->post('article_title'),
                            'article_body' => $this->input->post('article_body')
                        );
            if($this->loginmodel->is_updatearticle($articleid,$data))
            {
                $this->session->set_flashdata('msg', 'Article Updated successfully !!!!');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            else{
                $this->session->set_flashdata('msg', 'Article not Updated, please try again.');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            return redirect('admin/welcome');
        }
        else
        {
            $this->load->view('admin/editarticle');
        }
    }
    public function deleteArticle()
    {
        $id=$this->input->post('id');
            if($this->loginmodel->is_delete($id))
            {
                $this->session->set_flashdata('msg', 'Article deleted successfully !!!!');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            else{
                $this->session->set_flashdata('msg', 'Article not deleted, please try again.');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            return redirect('admin/welcome');
    }
    public function register()
    {
        $this->load->view('admin/register');
    }
    public function registerUser()
    {
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
        if($this->form_validation->run('user_register_rules'))
        {
            // $this->load->library('email');
            // $this->email->from(set_value('email'),set_value('firstname'));
            // $this->email->to('vinayaksutar.work@gmail.com');
            // $this->email->subject('Registration Greetings');
            // $this->email->message('Thank you for registering');
            // $this->email->set_newline("\r\n");
            // $this->email->send();

            // if(!$this->email->send())
            // {
            //     show_error($this->email->print_debugger());
            // }
            // else{
            //     "Your email has been sent successfully";
            // }

           
            if( $this->loginmodel->is_adduser())
            {
                $this->session->set_flashdata('msg', 'User added successfully !!!!');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            else{
                $this->session->set_flashdata('msg', 'User not added, please try again.');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            return redirect('admin/register');
        }
        else{
            $this->load->view('admin/register');
        }

    }
}
?>