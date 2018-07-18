    <!-- no <html>,<head>,etc teags are required as they will be present in the paremt documet. -->


    <nav class="navbar navbar-toggleable-sm bg-info navbar-inverse">
            <div class="container">
              <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-nav">
                  <!-- <a class="navbar-brand" href="header-nightsky.html" style="max-width:10%;border-radius:50%;"><img src="logo1.jpg" class="img-fluid"></a> -->
                  <a class="nav-item nav-link " href="header-nightsky.php">Home</a>
                  <a class="nav-item nav-link " href="AboutUs.php">About Us</a>
                  <a>
                    <form>
                      <input type="text" size="30" onkeyup="showResult(this.value)" style="background-color: #5bc0d4;align=center;margin-left: 80px;margin-top: 10px;color: white;">
                      <div id="livesearch"></div>
                    </form>
                  </a>
                </div>
              </div>
              <div class="btn-group" style="right:0;left:auto;">
                <button type="button" class="btn btn-info dropdown-toggle "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Settings
                </button>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-toggle-md" style="right:0;left:auto;" >
                  <!-- <a class="dropdown-item" href="#">Action</a> -->
                  <a class="dropdown-item" href="#myExpressInterestedModal" data-toggle="modal" data-target="#myExpressInterestedModal" id="ownProject" value="own" onclick="viewAdd(this)">View Owned projects</a>
                  <a class="dropdown-item" href="#myExpressInterestedModal" data-toggle="modal" data-target="#myExpressInterestedModal" id="viewProject" value="Interested" onclick="viewAdd(this)">View Interested projects</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </ul>
              </div>
            </div>
          </nav>
      <div class="jumbotron  jumbotron-fluid text-center bg-info text-white py-1"  >
        <h1 class = "display 1">ProSe</h1>
        <h4 class="display 4">Find your projects</h1>
          <div class="collapse navbar-collapse" id="mainNav">
          <!-- nav bar -->
      </div>
      <div class="modal fade" id ="myExpressInterestedModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myExpressInterestedModalHeader" style="color: black;">Interested projects</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: black;">&times;</button>
              </div>
              <div class="modal-body" id="myExpressInterestedModalBody" style="color: black;">
                <ol>
                  <li><a>Dummy project 1</a></li>
                  <li><a>Dummy project 2</a></li>
                </ol>
              </div>
              <div class="modal-footer" style="color: black;">
                <button type="button" class="btn btn-info" data-dismiss="modal">
                  close
                </button>
              </div>
            </div>
          </div>
        </div>
      <div>
        <script type="text/javascript">
            function showResult(str) {
              if (str.length==0) { 
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
              }
              $.ajax({
                type:"GET",
                url:"includes/livesearch.php",
                data:"q="+str,
                success:function(data)
                {
                  // alert(data);
                  var printstring="";
                  var array=[];
                  ar=data.split(',');
                  var k=0;
                  for (var i=0;i<ar.length;i++)
                  {
                    var str=ar[i].split(",");
                    array.push(str);
                  }
                for(i=0;i<array.length;i++)
                {
                  printstring+="<li>"+array[i]+"</li>" ;
                }
                  // alert(array[0]+array[1]+array[2]);          
                  document.getElementById("livesearch").innerHTML="<div style='background-color: #5bc0d4;align=center;margin-left: 80px;margin-top: 10px;'><ul style='list-style-type:none;'>"+printstring+"</ul></div>";
                  // document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                  document.getElementById("livesearch").style.color="white";
                }
              });
            }
            function viewAdd(link){
            var id =document.getElementById(link.id).id;
          if(id=='viewProject')
          {
            $.ajax({
              type:"POST",
              url:"includes/interestedadded.php",
              data:"choice="+link.id,
              success:function(data){
                var array=[];
                ar=data.split(',');
                var k=0;
                for (var i=0;i<ar.length;i++)
                {
                  var str=ar[i].split(",");
                  array.push(str);
                }
                var i=0;
                // $(#idvalue).html is not working here....
                var printstring="";
                for(i=1;i<array.length;i++)
                {
                  printstring+="<li><a href='interestedindex.php?choice="+array[i]+"'>"+array[i]+"</li>" 
                }
                document.getElementById("myExpressInterestedModalHeader").innerHTML="Interested projects"
                document.getElementById("myExpressInterestedModalBody").innerHTML="<ol>"+printstring+"</ol>"
                                
              }
            });
          }
          else
          {
            $.ajax({
              type:"POST",
              url:"includes/interestedadded.php",
              data:"choice="+link.id,
              success:function(data){
                var array=[];
                ar=data.split(',');
                var k=0;
                for (var i=0;i<ar.length;i++)
                {
                  var str=ar[i].split(",");
                  array.push(str);
                }
                var i=0;
                // $(#idvalue).html is not working here....
                var printstring="";
                for(i=1;i<array.length;i++)
                {
                  printstring+="<li><a href="+"ownerindex.php?choice="+array[i]+">"+array[i]+"</li>" 
                }
                document.getElementById("myExpressInterestedModalHeader").innerHTML="Owned projects"
                document.getElementById("myExpressInterestedModalBody").innerHTML="<ol>"+printstring+"</ol>"
                                
              }
            });
          }
      }
        </script>
      </div>