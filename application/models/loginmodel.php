<?php

class loginmodel extends CI_Model
{
    public function isvalidate($username, $password)
    {
        $q = $this->db->where(['username' => $username, 'password' =>$password])
                      ->get('users');
        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
            return false;
        }
    }
    public function articleList()
    {
        $id = $this->session->userdata('id');
        $q  = $this->db->select('article_title')
             ->from('articles')
             ->where(['user_id' => $id])
             ->get();
             return $q->result();
    }
    public function addArticles()
    {
        $id = $this->session->userdata('id');
        $data = array(
                        'user_id' => $this->session->userdata($id),
                        'article_title' => $this->input->post('article_title'),
                        'article_body' => $this->input->post('article_body')
                     );
        $this->db->insert('articles', $data);
        return true;
    }
}
?>