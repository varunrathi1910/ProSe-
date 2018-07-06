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
                  <a class="nav-item nav-link " href="AboutUs.html">About Us</a>
                </div>
              </div>
              <div class="btn-group" style="right:0;left:auto;">
                <button type="button" class="btn btn-info dropdown-toggle "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Settings
                </button>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-toggle-md" style="right:0;left:auto;" >
                  <!-- <a class="dropdown-item" href="#">Action</a> -->
                  <a class="dropdown-item" href="#myExpressInterestedModal" data-toggle="modal" data-target="#myExpressInterestedModal" id="addProject" onclick="viewAdd(this)">View Owned projects</a>
                  <a class="dropdown-item" href="#myExpressInterestedModal" data-toggle="modal" data-target="#myExpressInterestedModal" id="viewProject" onclick="viewAdd(this)">View Interested projects</a>
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