<?php
$dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "team_project";
        $username = "rpalaces";
        $password = "";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

?>
<html>
        <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        </head>
        
        <body>
            <h1>Playlist Database</h1>
            <form method="POST">
          	  Search for: <input type="text" name="fil_term" maxlength="15" value="Enter Here"/>
          	  Filter by: 
          	   <select name="choice">
          	   	  <option value="song"> Song </option>
          	   	  <option value="artist"> Artist </option>
          	   	  <option value="playlist"> Playlist </option>
          	   </select>
          	   <select name="order">
          	   	  <option value="ASC"> A-Z </option>
          	   	  <option value="DESC"> Z-A </option>
          	   </select>
          	   <center><input type='submit' value='Send' name='submit'</center>
          	 </form>
         <?php
         $searchkey = $_POST['fil_term'];
         $choice = $_POST['choice'];
         $order =$_POST['order'];
         
         $sql = "SELECT *
		FROM songs
		WHERE $choice 
		LIKE '$searchkey'";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
echo "Report 1: Name and country of birth of female actresses who were NOT born in the USA, ordered by last name <br/ >
    <table border='1'><tr><td>firstName</td><td>lastName</td><td>country_of_birth</td></tr>";
foreach ($results as $record) {
    
    echo "<tr><td>";
	echo $record['song_title'];
	echo "</td> <td>";
	echo $record['song_artist'];
	echo "</td><td>";
	echo $record['song_album'];
	echo "</td></tr>";
}	 
echo '</table><br>';
 

         ?>
        </body>
        </html>