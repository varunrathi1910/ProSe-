<?php
session_start();
$_SESSION['choice']=$_GET['choice'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='prose';
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

$sql = "SELECT * FROM project WHERE powner='$username' AND pname='$choice'";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $data[] = $row;
}
$pid=$data[$GLOBALS['$iter']]['pid'];
$projectStatusval=$data[$GLOBALS['$iter']]['pstatus'];
$projectStatus="";
if($projectStatusval==1)
{
  $projectStatus="Close project";
}
else
{
  $projectStatus="Open Project";
}

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
    <div class="col-lg-8">
      <div class="card text-muted" >
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
          <a href="#myClosedModal"  id="modalInterestedButton" class="card-link active" data-toggle="modal" data-target="#myClosedModal" onclick="openClose(this)">
            View Interested people
          </a>
          <a href="#myClosedModal"  id="modalCloseProjectButton" data-toggle="modal" data-target="#myClosedModal" class="card-link " onclick="openClose(this)"><?php echo $projectStatus; ?></a>

        </div>
        <!-- The Modal for interested-->
        <div class="modal fade" id ="myClosedModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myClosedModalHeader">Interested projects</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="myClosedModalBody" >
                <ol>
                  <li><a>Dummy project 1</a></li>
                  <li><a>Dummy project 2</a></li>
                  <li><a>Dummy project 3</a></li>
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
  </div>
</div>
    <?php
      $username=$_SESSION['username'];
    ?>
    <!-- ################################### -->
    <!-- Script to change the modal -->
    <script type="text/javascript">
      var choice="<?php echo $choice ;?>";
      // alert(choice);
      function openClose(link){
        var id =document.getElementById(link.id).id;
        console.log(id);
        if(id=='modalCloseProjectButton')
        {
          if(document.getElementById("modalCloseProjectButton").innerHTML=="Close Project")
          {
          var id1=document.getElementById("modalCloseProjectButton").innerHTML;
          $.ajax({
                  type: 'POST',
                  url: 'openclose.php',
                  data:'id='+id1+"&pid="+pid,
                  dataType: 'text',
                  success:function(data)
                  {
                    document.getElementById("myClosedModalHeader").innerHTML="Project Status";
                    document.getElementById("modalCloseProjectButton").innerHTML="Open Project";
                    document.getElementById("myClosedModalBody").innerHTML="Project closed succesfully";
                  }
               });
          }
          else 
          {
            
            $.ajax({
                    type: 'POST',
                    url: 'openclose.php',
                    data:'id='+id+"&pid="+pid,
                    dataType: 'text',
                    success:function(data)
                    {
                      document.getElementById("myClosedModalHeader").innerHTML="Project Status";
                      document.getElementById("modalCloseProjectButton").innerHTML="Close Project";
                      document.getElementById("myClosedModalBody").innerHTML="Project opened succesfully";
                    }
                 });
            


          }
          //$('#myExpressInterestedModal').attr('data-target','#myUninterestedModal');

        }
        else {
            $.ajax({
              type:"POST",
              url:"interestedpeople.php",
              data:"choice="+choice,
              success:function(data){
                // alert(data);
                var array=[];
                ar=data.split(',');
                var k=0;
                for (var i=0;i<ar.length;i++)
                {
                  var str=ar[i].split(",");
                  array.push(str);
                }
                var i=0;
                // // $(#idvalue).html is not working here....
                var printstring="";
                var offset=(array.length/2);
                // alert("alert");
                // alert("offset="+offset);
                for(i=0;i<(offset);i++)

                {
                  // alert(array[offset+i]);
                  printstring+="<li><a href='"+array[offset+i]+"'>"+array[i]+"</li>" ;
                }
                // document.getElementById("myExpressInterestedModalHeader").innerHTML="Owned projects"
                // document.getElementById("myExpressInterestedModalBody").innerHTML="<ol>"+printstring+"</ol>"
                document.getElementById("myClosedModalHeader").innerHTML="Interested People"
                document.getElementById("myClosedModalBody").innerHTML="<ol>"+printstring+"</ol>"                       
              }
            });  

        }
        }
      function newTab(url) {
        var win=window.open(url,'_blank');
        win.focus();
      }
    </script>
      </div>
    </div>    
  </body>
</html>
