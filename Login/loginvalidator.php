      <?php
      // echo "Succesful";)
         session_start();
         $uname=$_POST['uname'];
         $pass=$_POST['pass'];
         // echo "Username is ",$uname," and password is :",$pass;;
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass =''; 
         
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         
         $sql = "SELECT name, password FROM customerdb WHERE name='$uname'";
         mysql_select_db('test');
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_assoc($retval);
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
         
         mysql_close($conn);

      ?>