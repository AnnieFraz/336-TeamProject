<?php

        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "team_project";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", anniefraz, "");
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //default query statement 
        $default= "SELECT * FROM songs ";
        $default_result = $dbConn->query($default);

?>
<html>
        <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        </head>
        
        <body>
            <h1>Playlist Database</h1>
            <form method="post">
          	  Search for: <input type="text" name="filter_criteria" maxlength="15" value="Enter Here"/>
          	  Filter by: 
          	   <select name="choice">
          	   	  <option value="song"> Song </option>
          	   	  <option value="artist"> Artist </option>
          	   	  <option value="playlist"> Playlist </option>
          	   </select>
          	   <select name="order">
          	   	  <option value="asc"> A-Z </option>
          	   	  <option value="desc"> Z-A </option>
          	   </select>
          	   <center><input type='submit' value='Send' name='submit'/></center>
          	 </form>
          	 
          	 <!--default table display -->
          	 <div  align="center">
          	     <table id="default_table" border="1" cellspacing="0" cellpadding="2">
          	          <thead>
                	<tr>
                		<th> Title</th>
                		<th> Artist </th>
                		<th> Album </th>
                		<th> Genre</th>
                		<th> Year</th>
                	</tr>
                </thead>
                 <tbody>
               
               <?php
                for($i=0; $row = $default_result->fetch(); $i++)
                {
                ?>
                	<tr class="songs">
                		<td align="left"><?php echo $row['song_title']; ?></td>
                		<td align="left"><?php echo $row['song_artist']; ?></td>
                		<td align="left"><?php echo $row['song_album']; ?></td>
                		<td align="left"><?php echo $row['song_genre']; ?></td>
                		<td align="left"><?php echo $row['song_year']; ?></td>
                	</tr>
                	<?php
                }
                	?>
                </tbody>
          	         
          	     </table>
          	     
          	 </div>
        

<!-- This business happens when they select thir parameters-->        
         <?php
         
         //
         $filter_criteria = (isset($_POST['filter_criteria']) ? $_POST['filter_criteria'] : null);

         $sql = "SELECT * FROM songs ";
         
         
        
        $stmt = $dbConn->prepare($sql);
<<<<<<< HEAD
$stmt->execute(array(':parameter1'=>$filter_criteria));
while($row=$stmt->fetch()){
    echo "<table>";
        echo "<tr>
        <td>{$row['song_title']} </td>
        <td>{$row['song_artist']} </td>
        <td>{$row['song_playlist']} </td>
        </tr> </br>";
        echo "</table>";
}
        
        
         
         /*$sql = "";
=======
        $stmt->execute(array(':parameter1'=> $filter_criteria)); 
        
        
        
        
        
        
        
        //sorted table 
        while($row=$stmt->fetch()){
          echo "<tr><td>{$row['song_artist']}</td></tr>"; 
         $sql = "";
>>>>>>> 86fc13e85f3fe14c52979a71ead83b46c37fce8b
         
         if ($_POST['choice'] == 'song' && $_POST['order'] == 'desc') {
                 $sql = "SELECT * FROM songs WHERE song_title= ':parameter1' ORDER BY DESC";
         }
         if ($_POST['choice'] == 'artist' && $_POST['order'] == 'desc') {
                 $sql = "SELECT * FROM artist WHERE song_title= ':parameter1' ORDER BY DESC";
         }
         if ($_POST['choice'] == 'playlist' && $_POST['order'] == 'desc') {
                 $sql = "SELECT * FROM playlist WHERE song_title= ':parameter1' ORDER BY DESC";
         }
         if ($_POST['choice'] == 'song' && $_POST['order'] == 'asc') {
                $sql = "SELECT * FROM songs WHERE song_title= ':parameter1' ORDER BY ASC";
         }
         if ($_POST['choice'] == 'artist' && $_POST['order'] == 'asc') {
                 $sql = "SELECT * FROM artist WHERE song_title= ':parameter1' ORDER BY ASC";
         }
        if ($_POST['choice'] == 'playlist' && $_POST['order'] == 'asc') {
                 $sql = "SELECT * FROM playlist WHERE song_title=  ':parameter1' ORDER BY ASC";
         }
        

         ?>
         
      
        </body>
        </html>