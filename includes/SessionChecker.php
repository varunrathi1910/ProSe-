    <?php
    // session_start();
    // echo isset($_SESSION['username']);
    // When blank form is submitted a space is the value
    if(strlen($_SESSION['username'])==0)
    {
        echo "
        <script>
            alert('Redirected');
            window.location.href='login.php';
            session_destroy();
        </script>
        ";        
    }
    ?>