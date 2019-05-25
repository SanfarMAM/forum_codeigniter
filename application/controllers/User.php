<?php

class User extends CI_Controller {
    public function register()
    {
        $this->form_validation->set_data($this->input->post());
        
        $this->form_validation->set_rules('fname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
           $this->load->view('home');
        } else {
            $this->db->insert('tbluser', array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'gender' => $this->input->post('gender')
            ));
            $user = $this->db->insert('tblaccount', array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'user_Id' => $this->db->insert_id()
            ));
            if ($user) {
                redirect('','refresh');
            }
            
        }
    }
    // $query = "SELECT * FROM tblaccount WHERE username = '$username' AND password = '$pwd'";

    public function login()
    {
        // var_dump($this->input->post());die();
        $this->form_validation->set_data($this->input->post());
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
           $this->load->view('home');
        } else {
            $is_user = $this->db->select('tbluser.*')
            ->join('tblaccount', 'tblaccount.user_Id = tbluser.user_Id')
            ->where(array(
                'tblaccount.username' => $this->input->post('username'),
                'tblaccount.password' => md5($this->input->post('password'))
            ))
            ->get('tbluser')->last_row();
            // var_dump($is_user);die();
            if (empty($is_user)) {
                $this->load->view('home', array('user_error' => '<p class="validation_errors">User Does/\'nt Exist. Please Register</p>'));                
            } else {
               
               $sess_data = array(
                   'user_ID' => $is_user->user_Id,
                   'username' => $this->input->post('username'),
                   'password' => md5($this->input->post('password'))
               );
               
               $this->session->set_userdata( $sess_data );
               
               redirect('','refresh');
               
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
		
        redirect('home','refresh');
    }

    public function post($postid)
    {
        // $sql = mysql_query("SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
        $data['post'] = $this->db->select('tblpost.*, category.*, tbluser.*')
                            ->join('category', 'category.cat_id = tblpost.cat_id')
                            ->join('tbluser', 'tbluser.user_Id = tblpost.user_Id')
                            ->where('tblpost.post_Id', $postid)
                            ->get('tblpost')->last_row();
// $sql = mysql_query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' order by datetime");

        $data['comments'] = $this->db->select('tblcomment.*, tbluser.*')
                                        ->join('tbluser', 'tbluser.user_Id = tblcomment.user_Id')
                                        ->where('tblcomment.post_id', $data['post']->post_Id)
                                        ->get('tblcomment')->result('array');
        
        // var_dump($data['post']);die();
        $this->load->view('partials/header');
        $this->load->view('pages/content', $data);
        
        
    }

    public function addcomment()
    {
        // $comment = mysql_query("Insert into tblcomment (comment,post_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
        // $sql = mysql_query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' and c.user_Id='$userid' 
        //                     and c.datetime='$datetime'");

        $this->db->insert('tblcomment', array(
            'comment' => $this->input->post('comment'),
            'post_Id' => $this->input->post('postid'),
            'user_Id' => $this->input->post('userid'),
            'datetime' => date("Y-m-d h:i:sa"),
        ));

        $comments = $this->db->select('tblcomment.*, tbluser.*')
                        ->join('tbluser', 'tbluser.user_Id = tblcomment.user_Id')
                        ->where('tblcomment.post_Id', $this->input->post('postid'))
                        ->where('tblcomment.user_Id', $this->input->post('userid'))
                        ->get('tblcomment')->result('array');
        foreach ($comments as $comm) {
            echo "<label>Comment by: </label> ".$comm['fname']." ".$comm['lname']."<br>";
            echo '<label class="pull-right">'.$comm['datetime'].'</label>';
            echo "<p class='well'>".$comm['comment']."</p>";
        }
        
        
    }

    public function newquestion()
    {
// $sql = "INSERT INTO tblpost(title,content, cat_id,datetime,user_Id) VALUES ('$title','$content','$category','$datetime','$userid')";

        // var_dump($this->input->post());die();
        $post = $this->db->insert('tblpost', array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'cat_id' => $this->input->post('category'),
            'datetime' => date("Y-m-d h:i:sa"),
            'user_Id' => $this->input->post('userid'),
        ));
        if ($post)
        {
            echo '<script language="javascript">';
            echo 'alert("Post Successfully")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url='.base_url().'" />';
        }
        
    }
}