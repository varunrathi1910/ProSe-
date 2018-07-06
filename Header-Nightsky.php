<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/Header-Nightsky.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('SessionChecker.php');
    ?>  
    <?php
    include('header.php');
    ?>
    <!-- Additons-->
    <div class="row">
        <div class="image-block col-sm-4" style="background:url(ai.png) no-repeat center top;background-size:cover;" onclick="AI(this)">
               <p>Artificial Intelligence</p>
        </div>
      <div class="image-block col-sm-4" style="background:url(wt.png) no-repeat center top;background-size:cover;">
            <p> Web development</p>

        </div>
        <div class="image-block col-sm-4" style="background:url(ml.png) no-repeat center top;background-size:cover;">
            <p> Machine Learning </p>
        </div>
         <div class="image-block col-sm-4" style="background:url(iot.png) no-repeat center top;background-size:cover;">
            <p> Internet of Things </p>
        </div>
 <div class="image-block col-sm-4" style="background:url(and.png) no-repeat center top;background-size:cover;">
            <p> Android Development</p>
        </div>
     <div class="image-block col-sm-4" style="background:url(vlsi.png) no-repeat center top;background-size:cover;">
         <p> VLSI</p>
        </div>
        <div class="image-block col-sm-4" style="background:url(Capture.png) no-repeat center top;background-size:cover;">
         <p> Computer Networks</p>
        </div>
  <div class="image-block col-sm-4" style="background:url(sec.png) no-repeat center top;background-size:cover;">
            <p> Securities</p>
        </div>
      <div class="image-block col-sm-4" style="background:url(mec.png) no-repeat center top;background-size:cover;">
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
  function AI(link){
    window.location="proxyindex.php";
  }
</script>
</body>

</html>
