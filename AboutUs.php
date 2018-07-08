<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    
    <div class="container-fluid bg-info h-180">
      <div>
      <?php
        include('includes/SessionChecker.php');
      ?>
      <?php include('includes/header.php');?> 
      <div>
        
            <h2 class="text-center" id="heading">
              <hr style="border-color:white;width:200px;">
              ABOUT US
              <hr style="border-color:white;width:200px;">
            </h2>
              <p class="large pl-5" >Want to create your own Jarvis , or compete with Alexa? Find innovators  like you and collaborate.  If you can’t find your idea  you can put up your own. ProSe provides a platform to search projects from a vast number of projects and varied domains easily. We know the hassles of coming up a topic for the projects or team-mates thereof. See profiles of interested users or idea-owners on linkedin. Communicate, Collaborate; stop thinking and start doing.</p>
      </div>
    </div>

  </body>
</html>
