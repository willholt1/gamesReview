<?php
class HomeModel extends CI_Model{

    public function __construct()
    {
         $this->load->database();
    }

    //get all from the active reviews table to display on the homepage
    public function getGame()
    {
         $query = $this->db->get('activereviews');
         return $query->result();
    }

    //Get the details for a game once it has been clicked on.
    public function getReview($slug = FALSE)
    {

        //if there's no slug then return all
        if($slug === FALSE)
        {
            $query = $this->db->get('activereviews');
            return $query->result();
        }

        //otherwise return the review where the slug matches
        $query = $this->db->get_where('activereviews', array('slug' => $slug));
        return $query->result();
    }

    //get the comments
    public function getComments($slug = FALSE)
    {
        //need to join the tables to be able to display the username of the commenter as well as only comments for the review that is displayed
        /*
        SELECT *
        FROM gamescomments
        INNER JOIN users
        WHERE gamescomments.UserID = users.UID
        INNER JOIN activereviews
        WHERE activereviews.ID = gamescomments.ReviewID
        WHERE activereviews.slug = $slug
        */
        $this->db->select('*');
        $this->db->from('gamescomments');
        $this->db->join('users', 'gamescomments.UserID = users.UID', 'left');
        $this->db->join('activereviews', 'activereviews.ID = gamescomments.ReviewID');
        $this->db->where('activereviews.slug', $slug);
        $query = $this->db->get();

        return $query->result();
    }

    //save new comments to the database
    function saveComment()
    {
        //get the comment from the form
        $comment = $_POST['comment'];

        $id = $this->session->userdata('review_id');
        //put the information to be inserted into the form into an array
        //if a user is logged in comment as them, otherwise comment as anon
        if(isset($this->session->userdata['userID']))
        {
            $userid = $this->session->userdata('userID');
            $data = array(
                'UserID' => $userid,
                'ReviewID' => $id,
                'UserComment' => $comment
            );
        }
        else
        {
            $data = array(
                'UserID' => '2',
                'ReviewID' => $id,
                'UserComment' => $comment
            );
        }
    
        //insert data
        $this->db->insert('gamescomments', $data);
    }
}