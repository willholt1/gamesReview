<?php

//remove session data
$this->session->sess_destroy();
//redirect to previous page
redirect($_SERVER['HTTP_REFERER']);