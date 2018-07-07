<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/Header-Nightsky.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include('includes/SessionChecker.php');
    ?>  
    <?php
    include('includes/header.php');
    ?>
    <!-- Additons-->
    <div class="row">
        <div class="image-block col-sm-4" style="background:url(HomePagePhotos/ai.png) no-repeat center top;background-size:cover;"  value="ArtificialIntelligence" id= "ArtificialIntelligence" onclick="AI(id)" >
               <p>Artificial Intelligence</p>
        </div>
      <div class="image-block col-sm-4" style="background:url(HomePagePhotos/wt.png) no-repeat center top;background-size:cover;" id="WebDevelopment" onclick="AI(id)">
            <p> Web development</p>
        </div>
        <div class="image-block col-sm-4" style="background:url(HomePagePhotos/ml.png) no-repeat center top;background-size:cover;" id="MachineLearning" onclick="AI(id)">
            <p> Machine Learning </p>
        </div>
         <div class="image-block col-sm-4" style="background:url(HomePagePhotos/iot.png) no-repeat center top;background-size:cover;" id="InternetOfThings" onclick="AI(id)">
            <p> Internet of Things </p>
        </div>
 <div class="image-block col-sm-4" style="background:url(HomePagePhotos/and.png) no-repeat center top;background-size:cover;" value="AndroidDevelopment">
            <p> Android Development</p>
        </div>
     <div class="image-block col-sm-4" style="background:url(HomePagePhotos/vlsi.png) no-repeat center top;background-size:cover;" id="VLSI" onclick="AI(id)">
         <p> VLSI</p>
        </div>
        <div class="image-block col-sm-4" style="background:url(HomePagePhotos/Capture.png) no-repeat center top;background-size:cover;" id="ComputerNetworks" onclick="AI(id)">
         <p> Computer Networks</p>
        </div>
  <div class="image-block col-sm-4" style="background:url(HomePagePhotos/sec.png) no-repeat center top;background-size:cover;" id="Securities" onclick="AI(id)">
            <p> Securities</p>
        </div>
      <div class="image-block col-sm-4" style="background:url(HomePagePhotos/mec.png) no-repeat center top;background-size:cover;" id="Mechnanical" onclick="AI(id)">
          <p> Mechnanical </p>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- // <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

   <style>
.image-block {
    border: 3px solid white ;
    background-color: black;
    padding: 0px;
    margin: 0px;
    height:200px;
    text-align: center;
    vertical-align: bottom;
}
.image-block > p {
    width: 100%;
    height: 100%;
    font-weight: normal;
    font-size: 19px;
    padding-top: 150px;
    background-color: rgba(3,3,3,0.0);
    color: rgba(6,6,6,0.0);
}
.image-block:hover > p {
    background-color: rgba(3,3,3,0.5);
    color: white;
}
</style>
<script type="text/javascript">
  function AI(id){
    var a=id;
    // The below line sends the choice along with the url.It is then retrieved using GET[]
    window.location.replace("proxyindex.php?choice="+a);
  }
</script>
</body>
</html>
