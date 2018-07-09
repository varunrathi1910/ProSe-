<?php
session_start();
$_SESSION['choice']=$_GET['choice'];
// echo $_SESSION['id'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose' ;
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$choice = mysqli_real_escape_string($conn,$_SESSION['choice']);
$username = mysqli_real_escape_string($conn,$_SESSION['username']);
$fillerstring=str_repeat('s', 1);
$GLOBALS['$iter']=0;
// $_SESSION['CountProjects'];
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * FROM project WHERE pname='$choice' and pid IN(select pid from is_interested WHERE uname='$username')";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $data[] = $row;
}
$pid=$data[$GLOBALS['$iter']]['pid'];
// print_r($data);
?>
<script type="text/javascript">
  var javascriptiter=0;
  var interestvar=0;
  var pid="<?php echo $pid; ?>";
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  </head>

  <body>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-2.1.3.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      <?php
        include('includes/SessionChecker.php');
      ?> 
      <div>
        <?php include('includes/header.php');?>
      </div>
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" alt="Responsive">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active justify-content-md-center">
              <a class="nav-item nav-link" href="proxyindex.php?choice=ArtificialIntelligence">Artificial Intelligence</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=WebDevelopment">Web Development</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=MachineLearning">Machine Learning</a>
            </div>
            <div class="carousel-item justify-content-md-center">
              <!-- <p  style="color:white;">This text is to put the content in the middle of the carousel</p> -->
              <a class="nav-item nav-link" href="proxyindex.php?choice=InternetOfThings">Internet of Things</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=AndroidDevelopment">Android Development</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=VLSI">VLSI</a>
            </div>
            <div class="carousel-item justify-content-md-center">
              <!-- <p  style="color:white;">This text is to put the content in the middle of the carousel</p> -->
              <a class="nav-item nav-link" href="proxyindex.php?choice=ComputerNetworks">Computer Networks</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=Securities">Securities</a>
              <a class="nav-item nav-link" href="proxyindex.php?choice=Mechanical">Mechanical</a>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="left:0;right:auto;">
            <span class="carousel-control-prev-icon bg-info"style="border-radius:50%;" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next"  href="#carouselExampleControls" role="button" data-slide="next" style="right:0;left:auto;">
            <span class="carousel-control-next-icon bg-info "style="border-radius:50%;" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>

    </div>

<div class="main-container">
  <div class="row justify-content-md-center py-10">
    <div class="col-lg-1">
      <button onclick="IterCountDecreaser()" class="btn btn-secondary btn-info" role="button" aria-disabled="true" style="margin-top:200px">Previous</button>
    </div> 
    <div class="col-lg-8">
      <div class="card text-muted" >
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-block">
          <h4   id="pname" class="card-title"><b><?php echo $data[$GLOBALS['$iter']]['pname']; ?></b></h4>
          <p class="card-text" id="powner">Name of the owner: <b><?php echo $data[$GLOBALS['$iter']]['powner']; ?></b></p>
        </div>
        <ul class="list-group list-group-flush text-center">
          <div id="pdescription"/*style="overflow-x: scroll;max-width: 1000px;"*/><li class="list-group-item">Description of the project:
            <b><?php echo $data[$GLOBALS['$iter']]['pdescription']; echo $fillerstring ;?></b></li></div>
          <li class="list-group-item" id="peoplerequired">People required for the project: <b><?php echo $data[$GLOBALS['$iter']]['peoplerequired']; ?></b></li>
          <li class="list-group-item" id="peopleinterested">Number of people interested: <b><?php echo $data[$GLOBALS['$iter']]['peopleinterested']; ?></b></li>
        </ul>
        <div class="card-block">
          <!-- Button to Open the Modal -->
          <a href="#myInterestedModal"  id="modalInterestedButton" class="card-link active" data-toggle="modal" data-target="#myInterestedModal"  onclick="Interestfunc(this)">
            Uninterested
          </a>
          <a id="linkedin" href="#" class="card-link " onclick="newTab('https://www.linkedin.com/in/varun-rathi-674133139/')">View Profile</a>

        </div>
        <!-- The Modal for interested-->
        <div class="modal fade" id ="myInterestedModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Notice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <a id="modalInterestedBody">Interest expressed succesfully</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">
                  close
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal for  Viewing interested  and added projects-->

      </div>
    </div>
    <div class="col-lg-1 mx-10">
      <button onclick="IterCountIncreaser()"class="btn btn-secondary btn-info" role="button" aria-disabled="true" style="margin-top:200px">
        Next
      </button>
    </div>
  </div>
</div>
    <!-- The below script changes the value when the next and previous button are clicked -->
    <script>
      function IterCountIncreaser()
      {
          javascriptiter++;

        // alert(javascriptiter);
        AJAXCaller();
      }
      function IterCountDecreaser()
      {
        javascriptiter--;
        // alert(javascriptiter);
        AJAXCaller();
      }      
      function AJAXCaller()
      {

          $.ajax({
                  type: 'POST',
                  url: 'cardvaluechanger.php',
                  data:'javascriptiter='+javascriptiter,
                  dataType: 'text',
                  success:function(data)
                  {
                     // alert(data);
                     var array=[];
                     ar=data.split(',');
                     var k=0;
                     for(var i=0;i<ar.length;i++)
                     {
                      var str=ar[i].split(",");
                      array.push(str);
                     }
                     pid=array[6];
                     // alert("pid="+pid);
                     $('#pname').html("<h4 class="+"card-title"+"><b>"+array[0]+"</b></h4>");
                     $('#powner').html("Name of the owner:<b>"+array[1]+"</b>");
                     $('#pdescription').html("<li class='list-group-item'>Description of the project:<b>"+array[2]+"</b></li>");
                     $('#peoplerequired').html("People required for the project: <b>"+array[3]+"</b>");
                     $('#peopleinterested').html("Number of people interested: <b>"+array[4]+"</b>");
                     $('#linkedin').html("<a href='#' class='card-link' onclick='newTab('"+array[5]+"')'>View Profile</a>");
                  }

               }); 
        }                            
    </script>
    <?php
      $username=$_SESSION['username'];
    ?>
    <!-- ################################### -->
    <!-- Script to change the modal -->
    <script type="text/javascript">
      var username="<?php echo $username ;?>";
      function Interestfunc(link){
        if(interestvar ==1){
          $.ajax({
                  type: 'POST',
                  url: 'interestuninterestforinterestedindex.php',
                  data:'interestvar='+interestvar+"&pid="+pid+"&username="+username,
                  dataType: 'text',
                  success:function(data)
                  {
                    document.getElementById("modalInterestedButton").innerHTML='Uninterested';
                    document.getElementById("modalInterestedBody").innerHTML="Cheers!!! Interested";
                    interestvar=interestvar-1;
                  }
               });


        }
        else{
          $.ajax({
                  type: 'POST',
                  url: 'interestuninterestforinterestedindex.php',
                  data:'interestvar='+interestvar+"&pid="+pid+"&username="+username,
                  dataType: 'text',
                  success:function(data)
                  {
                    document.getElementById("modalInterestedButton").innerHTML='Interested';
                    document.getElementById("modalInterestedBody").innerHTML="Oops!!!Not Interested"
                    interestvar=interestvar+1;
                  }
               });  

        }
      }
      // var id =document.getElementById().id

      function newTab(url) {
        var win=window.open(url,'_blank');
        win.focus();
      }
    </script>
      </div>
    </div>    
  </body>
</html>
