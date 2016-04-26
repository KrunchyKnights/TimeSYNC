<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="../master.css"/>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>

<?php
    include "session.php";
    
    $Username = $Email = $Password = $Confirm_Password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach($_POST as $var => $value) {
            if(empty($_POST[$var])) {
                echo ucwords($var)." field is required!";
                break;return;
            }
        }

        if($_POST['Password'] != $_POST['Confirm_Password'])
            echo "Passwords should be same!<br>";
        /*
        else if(!isset($message)) {
            if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                echo "Invalid UserEmail!";
            }
        }
        */
        else if(!empty($_POST['Email'])&& !empty($_POST['Password'])) {

            $uname = $_POST["Username"];
            $pass = md5($_POST["Password"]); //encoding password
            $email = $_POST["Email"];
            
            $query_ins = 'INSERT INTO USERS(USERNAME,PASSWORD,EMAIL,SCHEDULE,ACTIVE) VALUES ("'.$uname.'", "'.$pass.'", "'.$email.'",0,0)'; //id field is automatically incremented.
            
            $result = mysqli_query($mysqli, $query_ins);
    
            if($result) {
                 echo "You have registered successfully!"; 
        
            } else {
                echo "Problem in registration. Try Again!"; 
                unset($_POST);
            }
            mysqli_close($mysqli);
 /*       
            if(mysqli_affected_rows($mysqli) > 0){
                echo "<p>You have registered successfully! </p>";
                echo "<a href='../index.html'>Go Back</a>";
            } else {
                echo "You FAILED to register! <br />";
                echo mysqli_error ($mysqli);
            }*/
        }
    }
?>

    <!-- <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="form-submit btn btn-default" style="margin-right: 10px;">Sign In</button>
    </form> -->

<div id=bar class="navbar navbar-inverse navbar-static-top">
    <div class="menu-wrap">
        <nav class="menu">
            <ul class="clearfix">
                <li><a href="../index.html"><img src="../timesync.png" height="40px", width="70px"></a>
                    <ul class="sub-menu">
                        <li><a href="../aboutUS.html">About timeSYNC</a></li>
                        <li><a href="../whoWeAre.html">Who We Are</a></li>
                        <li><a href="../ourGoal.html">Our Goal</a></li>
                        <li><a href="../upcomingAdditions.html">What's Coming</a></ul></li>

                </li>
                <li><a href="schedule/calendar.php">My Schedule</a></li>
                <li><a href="group.php">My Groups</a></li>
                <li><a href="logout.php">Login/Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class='aboutUS pull-right'>
    <form action="" method='POST'>
    Username: <input type="text" name="Username" value='<?php echo $Username; ?>'><br>
    Email: <input type="text" name="Email" value='<?php echo $Email; ?>'><br>
    Password: <input type="password" name="Password" value="<?php echo $Password; ?>"><br>
    Confirm_Password: <input type="password" name="Confirm_Password" value="<?php echo $Confirm_Password; ?>"><br><br>
    <button type="submit" value="register">Sign Up</button>
    </form>
</div>

</body>
</html>