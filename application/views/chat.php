<html>
<head>

	<title>Chat</title>
	
	<!-- link css-->
	<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
	<!-- Load in the required scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>application/scripts/chat.js"></script>

	<!-- Don't forget to load in Vue abd socket.io -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script> 

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
  <h1 class="display-3">Chat</h1>
</div>
<div><br><br></div>

<!--create an output for the chat service -->
<!--scrolls and direction is flipped so it's always scrolled to the bottom for new messages -->
<div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="width: 700px; height: 300px; display: flex; flex-direction: column-reverse;">
	<div id="chat"></div>
</div>

<!--Create an input for the chat service-->
<div id="enter">
    <form>
        <button id="sendbutton">Send</button>
	    <input type="text" id="message" autocomplete="off"></input>
    </form>
</div> 



<!-- This section needs editing to create the chat system using HTML -->
<!--
<button id="chatButton" class="open-button btn btn-success" onclick="openForm()">Chat</button>

<div class="chat-popup pull-right" id="myForm">
<form id="myform" class="form-container">
</form>

-->
</div>


</body>
</html>