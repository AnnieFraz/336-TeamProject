<h2>Your Playlist!</h2>
<?php session_start();
if(isset($_SESSION['songs']))
{
    foreach($_SESSION['songs'] as $cart)
    {
        $song_name = $cart['song_title'];
        
        echo "<tr><tb>";
        echo "$song_name";
        echo "</tb></tr>";
    }
}

?>