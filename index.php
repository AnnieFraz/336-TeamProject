<?php

        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "team_project";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", alerodriguezz, "");
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
            <form  id="filter_section"method="post">
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
          	   <center><input type='submit' name='filterBtn' value='Filter'/></center>
          	 </form>
          	 
          	 <!-- this section displays default table if the filter button has not been pressed -->
          	 
          	 <?php
          	 
          	 
          	 //this variable determines if default or filtered table is displayed (false by default)
          	 $table_switch=false;
          	 
          	 
          	 
                                         //this happpens when button is pressed 
                                        if(isset($_POST['filterBtn']))
                                        {   //switch is turned on    
                                            $table_switch=true;
                                            
                                                //store search text
                                                $search_text=$_POST['filter_criteria'];
                                                
                                                //store box options 
                                                $filter_by=$_POST['choice'];
                                                
                                                //store order options 
                                                $order_by=$_POST['order'];
                                                
                                                //query database table using default options
                                                 if ($filter_by == 'song' && $order_by == 'asc') {
                                                $filter_sql= "SELECT * FROM songs WHERE song_title LIKE '%" . $search_text . "%'  OR 
                                                                                        song_artist LIKE '%" . $search_text . "%' OR
                                                                                        song_album LIKE '%" . $search_text . "%' OR
                                                                                        song_genre LIKE '%" . $search_text . "%' OR
                                                                                        song_year LIKE '%" . $search_text . "%' 
                                                                                        ORDER BY song_title ";
                                                 }
                                                //query database table using song filter and descending order
                                                 if ($filter_by == 'song' && $order_by == 'desc') {
                                                 $filter_sql= "SELECT * FROM songs WHERE song_title LIKE '%" . $search_text . "%'  OR 
                                                                                         song_artist LIKE '%" . $search_text . "%' OR
                                                                                         song_album LIKE '%" . $search_text . "%' OR
                                                                                         song_genre LIKE '%" . $search_text . "%' OR
                                                                                         song_year LIKE '%" . $search_text . "%' 
                                                                                         ORDER BY song_title DESC ";
                                                 }
                                                
                                                //query database using song artist filter and ascending order
                                            if ($filter_by == 'artist' && $order_by == 'asc'){
                                                 $filter_sql= "SELECT * FROM songs WHERE song_title LIKE '%" . $search_text . "%'  OR 
                                                                                         song_artist LIKE '%" . $search_text . "%' OR
                                                                                         song_album LIKE '%" . $search_text . "%' OR
                                                                                         song_genre LIKE '%" . $search_text . "%' OR
                                                                                         song_year LIKE '%" . $search_text . "%' 
                                                                                         ORDER BY song_album ";
                                            }
                                                
                                                //query database using song artist filter and descending order
                                                      if ($filter_by == 'artist' && $order_by == 'desc'){
                                                 $filter_sql= "SELECT * FROM songs WHERE song_title LIKE '%" . $search_text . "%'  OR 
                                                                                         song_artist LIKE '%" . $search_text . "%' OR
                                                                                         song_album LIKE '%" . $search_text . "%' OR
                                                                                         song_genre LIKE '%" . $search_text . "%' OR
                                                                                         song_year LIKE '%" . $search_text . "%' 
                                                                                         ORDER BY song_album DESC ";
                                            }
                                                
                                                
                                                //this is where the query is run depending on the option chosen 
                                               $filtered_result = $dbConn->query($filter_sql);
                                        }
        
          	 
          	 ?>
          	 
          	 <!--table header -->
          	 <div  align="center">
          	   <form method= "get">
          	     <table id="default_table" border="1" cellspacing="0" cellpadding="2">
          	          <thead>
                	<tr>
                		<th> Song Title</th>
                		<th> Artist </th>
                		<th> Album </th>
                		<th> Genre</th>
                		<th> Year</th>
                	</tr>
                </thead>
                 <tbody>
               
               <?php
               
               //this stores the query that determines what table will be displayed 
               $the_query;
              
              //this determines what table will be displayed
               if($table_switch==true)
               {
                   $the_query=$filtered_result;
               }
               else
               {
                   $the_query=$default_result;
               }
               
                for($i=0; $row = $the_query->fetch(); $i++)
                {
                ?>
                	<tr class="songs"> 
                		<td align="left"><input type="checkbox" name="cart_items" value='song_title' />
                		                     <?php echo $row['song_title']; ?></td>
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
          	     
          	     </form>
          	     
          	 </div>
        

<!-- This business happens when they select thir parameters-->        
         <?php
         //array holding checked boxes 
         $checked = $_GET['cart_items'];

            for($i=0; $i < count($checked); $i++){
                echo "Selected " . $checked[$i] . "<br/>";
            }
         
         /*
        
        //sorted table 
        while($row=$stmt->fetch()){
          echo "<tr><td>{$row['song_artist']}</td></tr>"; 
         $sql = "";
         
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
        */
        
        ?>