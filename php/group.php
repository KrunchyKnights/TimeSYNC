<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="../master.css"/>
    <meta charset="UTF-8">
    <title>MyGroups</title>
</head>
<body>

<?php
    include "session.php";
    include "logged_in.php";
    
    $group_name = $public = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["group_name"] != "") {
            $g_result = $mysqli->query("SELECT * FROM GROUPS");
            $g_id = 0;

            while ($row = $g_result->fetch_array(MYSQLI_ASSOC)) {
                if($row["GROUP_NAME"] == $_POST["group_name"]) {
                    echo "Group Name has been taken.";
                    mysqli_close($mysqli);
                }
                $g_id = $row['ID'] + 1;
            }
            
            $new_group = "INSERT INTO GROUPS (GROUP_NAME, PUBLIC, ADMIN, ACTIVE)
                          VALUES ('$_POST[group_name]', '$_POST[public]', '$_SESSION[ID]', '1')";

            if (mysqli_query($mysqli, $new_group)) {
                $ug_result = $mysqli->query("SELECT * FROM MEMBERS");
                $con_ug = "INSERT INTO MEMBERS (GROUP_ID, USER_ID) VALUES ('$g_id', '$_SESSION[ID]')";

                mysqli_query($mysqli, $con_ug);
                mysqli_close($mysqli);
                header("location: ../index.html");
            } else {
                echo "Something went wrong!";
                mysqli_close($mysqli);
            }
        }
    }

?>

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
                <li><a href="../schedule/calendar.php">My Schedule</a></li>
                <li><a href="">My Groups</a></li>
                <li><a href="/php/logout.php">Login/Logout</a>

                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="aboutUS pull-right">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
    Group Name: <input type="text" name="group_name" value="<?php echo $group_name?>"><br>
    Public: <input type="text" name="public" value="<?php echo $public ?>"><br>
    <button type="submit" value="group">Create Group</button>
    </form>

    <br>
    <p class="pageTitle"><b>My Groups</b><br>
    <?php 
    $mem_result = $mysqli->query("SELECT GROUP_ID FROM MEMBERS WHERE USER_ID='$_SESSION[ID]'");
    while ($row = $mem_result->fetch_array(MYSQLI_ASSOC)) {
        $gp_result = $mysqli->query("SELECT GROUP_NAME FROM GROUPS WHERE ID='$row[GROUP_ID]'");
        $g_row = $gp_result->fetch_array(MYSQLI_ASSOC);
        echo $g_row['GROUP_NAME'];
        echo "<br>";
    }
    ?>
    </p>
<!--     <button class="add-group" id="addgrp">
        <span class="glyphicon glyphicon-plus">
            
        </span></button> -->

    <br>
    <p><b>All Groups</b><br>
    <?php
    $group_result = $mysqli->query("SELECT GROUP_NAME FROM GROUPS");
    while ($row = $group_result->fetch_array(MYSQLI_ASSOC)) {
        echo $row['GROUP_NAME'];
        echo " <a href=''>Join</a>";
        echo "<br>";
    }
    ?>
    </p>


<!--     <button class="add-group" id="addgrp">
        <span class="glyphicon glyphicon-plus">
            
        </span></button> -->

</div>


<script>
    document.getElementById(addgrp).addEventListener("click", add_group());
    function add_group() 

</script>
</body>
</html>