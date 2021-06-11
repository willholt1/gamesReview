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
	<title>review</title>
</head>

<body>

<div class="container">
    <div class="row">
        <?php
        foreach ($result as $row)
        {
            //These classes onlywork if you attach Bootstrap.
            echo '<div class="card cardBodyWidth '.$cssBodyClass.'">';

            //This is presuming you have a column in your database table called ReviewImage.
            $thisImage = $row->ReviewImage;
            //get the game image
            $image = base_url()."/application/images/".$thisImage;

            //get the game name
            $thisGameName = $row->GameName;
            //get the review
            $thisReview = $row->GameReview;
            //get the blurb
            $thisBlurb = $row->GameBlurb;

            //set a session variable of the current review ID - used for saving comments to specific reviews
            $thisReviewID = $row->ID;
            $this->session->set_userdata('review_id', $thisReviewID);
            //$_SESSION['review_ID'] = $row->ReviewID;

            //display all the game info - title/cover/blurb/review
            echo '<div class="container">
                <div class = "row">
                    <div class="col-xs-6">
                        <h1 class="display-1">'.$thisGameName.'</h1>
                    </div>
                    <div class="col-xs-6">
                        <img src="'.$image.'" alt="'.$thisGameName.' Cover" width="200" height="320">
                    </div>
                    <div class="col-xs-4">
                        <h1 class="display-4">Blurb</h1>
                        <p overflow-wrap:break-word>'.$thisBlurb.'</p>
                    </div>
                    <div class="col-xs-8">
                        <h1 class="display-4">Review</h1>
                        <p>'.$thisReview.'</p>
                    </div>
                </div>
            </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<!--display the comments -->
<div class="container">
    <div class="row">
    <h1 class="display-4">Comments</h1>
    <?php
        foreach ($comments as $row)
        {
            //get the username and the comment
            $thisUser = $row->UserName;
            $thisComment = $row->UserComment;
        
            //display the username in bold and the comment they made
            echo '<div class="container">
                    <p><b>'.$thisUser.'</b> > '.$thisComment.'</p>
            </div>';
        }
    ?>
    </div>
</div>

<!-- comment box -->
<div class="container">
    <div class="row">
        <form action="<?php echo base_url();?>index.php/Home/saveData" method="post">
            <input type="text" name="comment" size="100">

            <input type="submit" value="Comment"/>
	    </form>
    </div>
</div>


</body>
</html>