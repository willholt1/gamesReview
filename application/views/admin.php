<html>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- link css-->
<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- Load in the required scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Don't forget to load in Vue abd socket.io -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script> 

<!-- Load in your custom scripts -->

<title><?php echo $title?></title>
    <!-- These classes onlywork if you attach Bootstrap. -->
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/chat">Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/signup">Signup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/admin">Account</a>
            </li>
            <li class = "nav-item">
                <p class="navbar-text"> <?php echo '     Username: '.$this->session->userdata('logged_in');?></p>
            </li>
        </ul>
    </nav>

</head>

<body>
<!-- Heading -->
<div class="container">
    <h1 class="display-4">Profile</h1>
</div>

<div class="container">
    
    <!-- display username -->
    <?php
    if(isset($this->session->userdata['logged_in']))
    {
        $username = $this->session->userdata('logged_in');
        echo "You are logged in as: <b>" . $username."</b>";
        ?>
        <br><b><a href="<?php echo base_url();?>index.php/logout">Logout</a></b>
        <?php
    }
    else
    {
        echo 'You are not logged in.';
        ?>
        <br><b><a href="<?php echo base_url();?>index.php/login">To Log-in click here</a></b>
        <br><b><a href="<?php echo base_url();?>index.php/signup">To create an account click here</a></b>
        <?php
    }
    ?>
</div>

</body>