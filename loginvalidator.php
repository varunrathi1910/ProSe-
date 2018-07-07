      <?php
      // echo "Succesful";)
         session_start();
         $uname=$_POST['uname'];
         $pass=$_POST['pass'];
         // echo "Username is ",$uname," and password is :",$pass;;
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass ='';
         $db='prose' ;
         
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         
         $sql = "SELECT uname, password FROM user WHERE uname='$uname'";
         $retval = mysqli_query($conn,$sql );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysqli_fetch_assoc($retval);
         // echo $row['password'];
         if($row['password']==$pass)
         {
           $_SESSION['username']=$uname;
           if(isset($_SESSION['username']))
           {
               echo "Login";
           }
           else
           {
               echo 'Some error has ocured';
               header('Location:login.php');
           }
           // header('Location:welcome.php');
         }
         else
         {
           echo 'Some error has ocured'; 
         }         
         
         // echo "Fetched data successfully\n";
         
         mysqli_close($conn);

      ?>