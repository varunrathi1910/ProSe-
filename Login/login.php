<!-- Integrate this code with the signup page that you are creating. It is Login using AJAX -->
<!-- The starter template's cdn links do not work for AJAX and jQuery use these ones instead. -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $('#submitbtn').click(function(){
            var uname= $('#exampleInputEmail1').val();
            var pass=$('#pass').val();
                $.ajax({
                    type:'POST',
                    url:'loginvalidator.php',
                    data:'uname='+uname+'&pass='+pass,
                    success:function(response){
                        if(response.trim()=="Login")
                        {
                          window.location.href = '../Header-Nightsky.html';
                        }
                        else
                        {
                          // $('#rsearch').html(response);
                          alert(typeof(response));                          
                        }
                      }
                    });
                  });
                });
    </script>    
  </head>
  <body>
      <form method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="uname">
      </div>
      <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" name="pass" id="pass">
      </div>
      <input type="button" class="btn btn-primary" name="submitbtn" id="submitbtn" value="submit"></input>
      </form>

      <div id="rsearch"></div>
          <!-- Optional JavaScript -->
    <!-- jQuery
     first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    -->
  </body>
</html>