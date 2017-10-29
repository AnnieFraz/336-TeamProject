<?php

session_start();

$dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "taem_project";
        $username = "alerodriguezz";
        $password = "";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
?>
<html>
        <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <meta charset="utf-8"/>
        </head>
        
        <body>
            <h1>Playlist Database</h1>
            <form method="POST">
          	  Search for: <input type="text" name="fil_term" maxlength="60" value="Enter Here"/>
          	  Filter by: 
          	   <select name="choice">
          	      <option value="name"> Artist </option>
          	   	  <option value="song_title"> Title </option>
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
<<<<<<< HEAD
$results = $stmt->fetchAll(); ?>

<form action="cart.php" method="get">
    <table border="1">
    <tr>
        <td>Add</td><td>Title</td><td>Artist</td><td>Album</td><td>Genre</td>
        </tr>
        
<?php        
foreach ($results as $record) {
    
    ?>
    <tr> 
            <td><input type="checkbox" name="cart_list[]" value="<?php $record['song_title']?>"></td> 
                                                                        <td><?php echo $record['song_title']; ?></td> 
                                                                        <td><a href="desc/<?php $record['name'] ?>.html"><?php echo $record['name']?></a></td>
                                                                        <td><?php echo $record['album_name']; ?> </td>
                                                                        <td><?php echo $record['genre_name']; } ?> </td>
                                                                        <input type='submit' value='Add to Cart' name='cart'/>
    </tr>
    </table>
    </form><br>

        </body>
</html>
<?php

/*$checked = $_GET['cart_list[]'];
for($i=0; $i < count($checked); $i++){
    echo "Selected " . $checked[$i] . "<br/>";
}
*/


?>