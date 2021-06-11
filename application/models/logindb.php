<?php

Class logindb extends CI_Model {

public function __construct()
{
    $this->load->database();
    $this->load->helper('security');
}

// Insert registration data in database
public function registerUser()
{
    //get the username and password from the form
    $username = $_POST['user_name'];
    $password = $_POST['pass_word'];

    //clean the UN and PW of xss using the security helper
    $cleanUN = xss_clean($username);
    $cleanPW = xss_clean($password);

    //check if username is available
    $condition = "UserName =" . "'" . $cleanUN . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    //if there is no matching record for that username
    if ($query->num_rows() == 0) 
    {
        //array of data to insert into the db
        $data = array(
            'UserName' => $cleanUN,
            'UserPassword' => $cleanPW,
            'DarkMode' => '1'
        );

        //create new user
        $this->db->insert('users', $data);

        //if it works return true
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
    }
    //user already exists, return false
    else
    {
    return false;
    }
}

// Read data using username and password
public function login() 
{
    //get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //clean the UN and PW of xss using the security helper
    $cleanUN = xss_clean($username);
    $cleanPW = xss_clean($password);

    $condition = "UserName =" . "'" . $cleanUN . "' AND " . "UserPassword =" . "'" . $cleanPW . "'";

    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    //put the user id into a session variable in order to be able to make comments as the logged in user
    $row = $query->row();
    $UID = $row->UID;
    $this->session->set_userdata('userID', $UID);


    //if there is a matching record
    if ($query->num_rows() == 1) 
    {
        $this->session->set_userdata('logged_in', $cleanUN);
        return true;
    }
    else
    {
        return false;
    }
}

}

?>