<?php
$dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "taem_project";
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
            <form method="POST">
          	  Search for: <input type="text" name="fil_term" maxlength="60" value="Enter Here"/>
          	  Filter by: 
          	   <select name="choice">
          	   	  <option value="song_title"> Title </option>
          	   	  <option value="name"> Artist </option>
          	   	  <option value="genre_name"> Genre </option>
          	   	  <option value="album_name"> Album </option>
          	   </select>
          	   <select name="order">
          	   	  <option value="ASC"> A-Z </option>
          	   	  <option value="DESC"> Z-A </option>
          	   </select>
          	   <center><input type='submit' value='Send' name='submit'/></center>
          	 </form>
        
         <?php
         $searchkey = $_POST['fil_term'];
         $choice = $_POST['choice'];
         $order =$_POST['order'];
         
        $sql = "SELECT songs.song_title, artist.name, albums.album_name, genre.genre_name
		FROM  albums
		INNER JOIN genre on albums.genre_id=genre.genre_id
		INNER JOIN artist ON albums.artist_id=artist.artist_id
		INNER JOIN songs ON albums.album_id=songs.album_id
		WHERE $choice LIKE '$searchkey'
		ORDER BY song_title $order";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
echo "<form action='cart.php' method='post'>
    <table border='1'><tr><td>Add</td><td>Title</td><td>Artist</td><td>Album</td><td>Genre</td></tr>";
foreach ($results as $record) {
    echo "<tr><td>";
    echo "<input type='submit' value='Add' name='add'/>";
	echo "</td> <td>";
	echo $record['song_title'];
	echo "</td> <td>";
	echo "<a href='desc/".$record['name'].".html'>".$record['name']."</a>";
	echo "</td><td>";
	echo $record['album_name'];
	echo "</td><td>";
	echo  $record['genre_name'];
	echo "</td></tr>";
}	 
echo '</table><br>';
         ?>
         
      
        </body>
        </html>