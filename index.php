<?php

        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "taem_project";
        
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
        <title>Playlist Database</title>
        </head>
        
        <body>
            <h1>Playlist Database</h1>
            <form method="post">
          	  Search for: <input type="text" name="filter_criteria" maxlength="15" value="Enter Here"/>
          	  Filter by: 
          	   	  <select name="choice">
          	   	  <option value="song_title"> Title </option>
          	   	  <option value="name"> Artist </option>
          	   	  <option value="genre_name"> Genre </option>
          	   	  <option value="album_name"> Album </option>
          	   </select>
          	   </select>
          	   <select name="order">
          	   	  <option value="asc"> A-Z </option>
          	   	  <option value="desc"> Z-A </option>
          	   </select>
          	   <center><input type='submit' value='Search' name='submit'/></center>
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
                	?><?php
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