<?php
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "team_project";
        $username = "anniefraz";
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
            <form method="get">
          	  Search for: <input type="text" name="filter_criteria" maxlength="15" value="Enter Here"/>
          	  Filter by: 
          	   <select name="choice">
          	   	  <option value="song"> Song </option>
          	   	  <option value="artist"> Artist </option>
          	   	  <option value="playlist"> Playlist </option>
          	   </select>
          	   <center><input type='submit' value='Send' name='submit'</center>
          	   </form>
         <?php
         $filter_criteria = (isset($_POST['filter_criteria']) ? $_POST['filter_criteria'] : null);
         //$sql = "";
         
         //if ($_POST['choice'] == 'song') {
                // $sql = "SELECT * FROM song WHERE song_title= " .$filter_criteria;
        // }
        // if ($_POST['choice'] == 'artist') {
                // $sql = "SELECT * FROM song WHERE song_artist= " .$filter_criteria;
        // }
        // if ($_POST['choice'] == 'playlist') {
                // $sql = "SELECT * FROM playlist WHERE playlist_name= " .$filter_criteria;
         //}
         
          //$sql = "SELECT * FROM songs WHERE song_title=".mysql_real_escape_string($_POST['filter_criteria'] . ";");
        $sql = "SELECT * FROM songs WHERE song_title=(':parameter1')";
         
        $stmt= $dbConn->prepare($query);
        $stmt->execute(array(':parameter1'=>$_POST['filter_criteria']));
         while($row=$stmt->fetch()){
         echo "<tr>
        <td>{$row['song_artist']}</td>
        </tr>";
}
         ?>
        </body>
        </html>