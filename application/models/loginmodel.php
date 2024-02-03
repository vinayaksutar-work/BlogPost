<?php

class loginmodel extends CI_Model
{
    public function is_login($username, $password)
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
    public function is_articlelist($limit,$offset)
    {
        $id = $this->session->userdata('id');
        $q  = $this->db->select()
             ->from('articles')
             ->where(['user_id' => $id])
             ->limit($limit, $offset)
             ->get();
             return $q->result();
    }
    public function num_rows()
    {
        $id = $this->session->userdata('id');
        $q  = $this->db->select()
             ->from('articles')
             ->where(['user_id' => $id])
             ->get();
             return $q->num_rows();
    }
    public function is_addarticles()
    {
        $id = $this->session->userdata('id');
        $data = array(
                        'user_id' => $id,
                        'article_title' => $this->input->post('article_title'),
                        'article_body' => $this->input->post('article_body')
                     );
        return $this->db->insert('articles', $data);
    }
    public function is_adduser()
    {
        $data = array(
                        'username' => $this->input->post('username'),
                        'password' => sha1($this->input->post('password')),
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'email' => $this->input->post('email')
        );
        return $this->db->insert('users', $data);
    }
    public function is_delete($id)
    {
        return $this->db->delete('articles', array('id' => $id));
    }
    public function is_editarticle($articleid)
    {
       $q = $this->db->select(['article_title','article_body','id'])
                 ->where(['id'=> $articleid])
                 ->get('articles');
                 return $q->row();
    }
    public function is_updatearticle($articleid, Array $article)
    {
        return $this->db->where('id', $articleid)
                 ->update('articles', $article);
    }
}
?>