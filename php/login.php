<!DOCTYPE html>
<html lang="en">

<?php
    include "session.php";
    $login_email = "";
    $login_pass = "";

    if (isset($_GET['form']) && $_GET['form']=='log') {
        if(!empty($_POST['login_email']) && !empty($_POST['login_pass'])) {
            $result = $mysqli->query("SELECT * FROM user WHERE email='$login_email' AND password='$login_pass'");
        }
        if($result->num_rows) {
            $ip=$_SERVER['REMOTE_ADDR'];
            $row=$result->fetch_array(MYSQLI_ASSOC);
            
            $_SESSION['id']=$row['id']
            $_SESSION['user']=$row['username'];
            
            header("location:$site_url");
        }
    }
?>

<head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="master.css"/>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title>LogIn</title>
</head>
<body>
<div class="title" style="text-align: left;"><a href="index.html" style="margin-left: 10px;">TimeSYNC</a>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="form-submit btn btn-default" style="margin-right: 10px;">Sign In</button>
    </form></div>

<div id=bar class="navbar navbar-inverse navbar-static-top">
    <div class="menu-wrap">
        <nav class="menu">
            <ul class="clearfix">
                <li><a href="index.html">Home</a></li>
                <li><a href="calendar.html">My Schedule</a></li>
                <li><a href="myGroups.html">My Groups</a></li>
                <li><a href="settings.html">Settings<span class="arrow">&#9660;</span></a>
                    <a class="sub-menu" href="logout.html">Logout</a>

                </li>

            </ul>
        </nav>
    </div>
</div>

<div id ='login' class=''>
    <form action='<?php ?form=log ?>' method='post'>
    Email: <input type="text" name='<?php login_email; ?>'><br>
    Password: <input type="password" name="<?php login_pass; ?>"><br>
    <button type="submit">Log In</button>
    </form>
</div>

</body>
</html>