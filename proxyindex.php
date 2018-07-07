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
$iter=0;
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * FROM project WHERE pdomain='$choice' and pstatus=1 and powner!='$username'";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $data[] = $row;
}

// print_r($data);
?>
<script type="text/javascript">
  var javascriptiter=0;
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>

  <body>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
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
              <!-- <p  style="color:white;">This text is to put the content in the middle of the carousel</p> -->
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
<!--       <button onclick="IterCountIncreaser()"class="btn btn-secondary btn-info" role="button" aria-disabled="true" style="margin-top:200px">
        Next
      </button>   -->  
    <div class="col-lg-8">
      <div class="card text-muted" >
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-block">
          <h4 class="card-title"><b><?php echo $data[$iter]['pname']; ?></b></h4>
          <p class="card-text">Name of the owner: <b><?php echo $data[$iter]['powner']; ?></b></p>
        </div>
        <ul class="list-group list-group-flush text-center">
          <div /*style="overflow-x: scroll;max-width: 1000px;"*/><li class="list-group-item">Description of the project:
            <b><?php echo $data[$iter]['pdescription']; echo $fillerstring ;?></b></li></div>
          <li class="list-group-item">People required for the project: <b><?php echo $data[$iter]['peoplerequired']; ?></b></li>
          <li class="list-group-item">Number of people interested: <b><?php echo $data[$iter]['peopleinterested']; ?></b></li>
        </ul>
        <div class="card-block">
          <!-- Button to Open the Modal -->
          <a href="#myInterestedModal"  id="modalInterestedButton" class="card-link active" data-toggle="modal" data-target="#myInterestedModal" onclick="Interestfunc(this)">
            Interested
          </a>
          <a href="#" class="card-link " onclick="newTab('https://www.linkedin.com/in/varun-rathi-674133139/')">View Profile</a>

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
        <div class="modal fade" id ="myExpressInterestedModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myExpressInterestedModalHeader">Interested projects</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="myExpressInterestedModalBody" >
                <ol>
                  <li><a>Dummy project 1</a></li>
                  <li><a>Dummy project 2</a></li>
                </ol>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">
                  close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-1 mx-10">
      <!-- <img src="chevron-right.svg" class="rounded float-left" alt="Responsive image" onclick="myFunctionNext()" style="margin-top:400px"></img> -->
      <!-- <a href="index.html" class="btn btn-secondary btn-info" role="button" aria-disabled="true" style="margin-top:200px">Next</a> -->
      <button onclick="IterCountIncreaser()"class="btn btn-secondary btn-info" role="button" aria-disabled="true" style="margin-top:200px">
        Next
      </button>
    </div>
  </div>
</div>
    <script type="text/javascript">
      var interestvar=0;
      function myFunctionNext(){
        window.location="index.html";
      }
      function myFunctionPrevious(){
        window.location="index.html";
      }
      // var id = document.getElementById("modalInterestedBody").innerHTML;
      function Interestfunc(link){
        // console.log(id);
        if(interestvar ==0){
          document.getElementById("modalInterestedButton").innerHTML='Uninterested';
          document.getElementById("modalInterestedBody").innerHTML="Cheers!!! Interested"
          //$('#modalInterestedButton').attr('data-target','#myInterestedModal');
          interestvar=interestvar+1;
        }
        else{
          document.getElementById("modalInterestedButton").innerHTML='Interested';
          document.getElementById("modalInterestedBody").innerHTML="Oops!!!Not Interested"
           //$('#modalInterestedButton').attr('data-target','#myUninterestedModal');
          interestvar=interestvar-1;
        }
      }
      // var id =document.getElementById().id
      function viewAdd(link){
        //console.log(link);
        var id =document.getElementById(link.id).id;
        console.log(id);
        if(id=='viewProject')
        {
          //$('#myExpressInterestedModal').attr('data-target','#myUninterestedModal');
          document.getElementById("myExpressInterestedModalHeader").innerHTML="Interested projects"
          document.getElementById("myExpressInterestedModalBody").innerHTML="<ol><li>D1</li><li>D2</li></ol>"
        }
        else {
          document.getElementById("myExpressInterestedModalHeader").innerHTML="Owned projects"
          document.getElementById("myExpressInterestedModalBody").innerHTML="<ol><li><a href='ownerindex.html'>D3</li><li>D4</li></ol>"
        }
      }
      function newTab(url) {
        var win=window.open(url,'_blank');
        win.focus();
      }
    </script>
    <!-- <script>
      $(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });

      $("#modalButton").click(function (event) {
          if ($(this).hasClass("disabled")) {
              event.preventDefault();
          }
          $(this).addClass("disabled");
      });
    </script> -->
    <script type="text/javascript">
      function IterCountIncreaser()
      {
          javascriptiter++;
          alert(javascriptiter);
      }
      function IterCountDecreaser()
      {
          javascriptiter-=1;
          alert(javascriptiter);
      }      
    </script>

      </div>
    </div>    
  </body>
</html>
