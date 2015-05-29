<?php
session_start();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
	include 'dbinfo.php';
    



    // This file handles the majority of the database interaction             

    if (array_key_exists("action", $_POST)) 
    {

        
        // mysql handler
        $mysqli = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);
        

        if ($_POST['action'] == 'addGoal')
        {
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $reward = $_POST['reward'];
            $end_goal = $_POST['endgoal'];
            $uid = $_POST['uid'];
            $q =  "INSERT INTO goals (name,description,reward,end_goal,owner_id) VALUES ('$name','$desc','$reward','$end_goal','$uid')";
                echo $q;
                $insert = $mysqli->query($q);
                if ($insert)
                {
                   echo "Success";    
                }
        }
    }     
    
?>
