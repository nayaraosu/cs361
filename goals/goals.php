<?php session_start();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
	include 'dbinfo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="final.css">
<script src="final.js"></script>

</head>
<title>Goals</title>
<body>
  	<?php
        echo '<h1>Goals</h1>';
        echo '<h2>Add a new Goal</h2>';
        echo '<label>Goal name: <input type="text" id="name" name="goal_name"></label><br>';
        echo '<label>Goal description: <textarea id="desc" name="goal_desc"></textarea></label><br>';
        echo '<label>Goal to meet: <textarea id="meet" name="goal_meet"></textarea></label><br>';
        echo '<label>Reward: <textarea id="reward" name="goal_reward"></textarea></label><br>';
 		echo '<button onclick="addGoal()">Add Goal</button><br><br>';    
        echo '<div id="status"></div><br><br>';  	

        $mysqli = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);
        $q =  "SELECT name,description,end_goal,reward from goals";
        $select = $mysqli->query($q);
       
            if ($select->num_rows >0 )
            {

                echo "<table>";
                echo "<th>Goal Name</th><th>Description</th><th>Goal to Reach</th><th>Reward</th>";
                while ($row = $select->fetch_assoc()) 
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['description'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['end_goal'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['reward'];
                    echo "</td>";
                    echo "</tr>";

                }
                
            }
?>
</body>
</html>

