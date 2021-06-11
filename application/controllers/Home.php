<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Consider if it would be best to autoload some of the helpers from here.
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
        $this->load->helper('cookie');


        // Load in your Models below.
        $this->load->model('HomeModel');

        //load the model that deals with the database side of login
        //i.e. does this user exist etc.
        $this->load->model('logindb');

    }

    public function index()
    {
        // Change this to whatever title you wish.
        $data['title']  = 'Games Reviews';

        
        // Get the data from our Home Model.
        $data['result'] = $this->HomeModel->getGame();
        
        //Load the view and send the data accross.
        $this->load->view('home', $data);
    }

    public function review($slug = NULL)
    {
        //Get the data from the model based on the slug we have.

        // Get the data from our Home Model.
        $data['result'] = $this->HomeModel->getReview($slug);

        //get the comments
        $data['comments'] = $this->HomeModel->getComments($slug);

        //404 if there is no result fron the query
        if(empty($data['result']))
        {
            show_404();
        }

        //send the data over to the review view
        $this->load->view('review', $data);
    }

    public function saveData()
    {
        //call the saveComment function from the HomeModel
        $this->HomeModel->saveComment();
        
        $this->load->view('submissionSuccessful');
    }

    public function chat()
    {
        //load the chat page
        $this->load->view('chat', $data);
    }

    public function login()
    {
        //load login page
        $this->load->view('login');
    }

    public function logout()
    {
        $this->load->view('logout');
    }

    public function admin()
    {
        //load login page
        $this->load->view('admin');
    }

    public function signup()
    {
        //load sign-up page
        $this->load->view('signup');
    }



    public function newUser()
    {
        //if the user is already logged in display an error message
        if(isset($this->session->userdata['logged_in']))
        {
            //send error message to the login view
            $data['error_message'] = 'Please logout first';
            $this->load->view('signup', $data);
        }
        //if they aren't already logged in:
        else
        {
            //run the register user function - true if the username is available
            $result = $this->logindb->registerUser();

            //if creation was successful
            if ($result == TRUE)
            {
                //if the user exist
                $this->load->view('login');
                
            }
            //creation failed
            else
            {
                //send error message to the signup view
                $data['error_message'] = 'Invalid username or password.';
                $this->load->view('login', $data);
            }
        }
    }
    

    //logging in an existing user
    public function loginUser()
    {
        //if the user is already logged in send them to the admin page
        if(isset($this->session->userdata['logged_in']))
        {
            $this->load->view('admin');
        }
        //if they aren't already logged in:
        else
        {
            //run the login function - true if the username and password are correct
            $result = $this->logindb->login();

            //if the user exists
            if ($result == TRUE)
            {
                //if the user exist
                $this->load->view('admin');
            }
            //user doesn't exist
            else
            {
                //send error message to the login view
                $data['error_message'] = 'Invalid username or password.';
                $this->load->view('login', $data);
            }
        }
    }

  
}