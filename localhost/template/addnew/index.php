<?php include('../header.php'); ?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>GFG- Store Data</title>
</head>
  
<body>
    <center>
        <h1>Storing Form data in Database</h1>
  
        <form action="insert.php" method="post">
              
            <p>
                <label for="no">No:</label>
                <input type="integer" name="no" id="No">
            </p>
  
  
              
            <p>
                <label for="status">Status:</label>
                <input type="varchar" name="status" id="Status">
            </p>
  
              
              
            <p>
                <label for="p1">P1:</label>
                <input type="varchar" name="p1" id="P1">
            </p>
  
              
              
            <p>
                <label for="p2">P2:</label>
                <input type="varchar" name="p2" id="P2">
            </p>
          
          
          
            <p>
                <label for="p3">P3:</label>
                <input type="varchar" name="p3" id="P3">
            </p>
          
          
          
            <p>
                <label for="stock">Stock:</label>
                <input type="varchar" name="stock" id="Stock">
            </p>
          
          
          
            <p>
                <label for="location">Location:</label>
                <input type="varchar" name="location" id="Location">
            </p>
          
          
          
            <p>
                <label for="sake_brewer">Sake brewer:</label>
                <input type="varchar" name="sake_brewer" id="Sake_brewer">
            </p>
          
          
          
            <p>
                <label for="name">Name:</label>
                <input type="varchar" name="name" id="Name">
            </p>
          
          
          
            <p>
                <label for="volume">Volume:</label>
                <input type="varchar" name="volume" id="Volume">
            </p>
          
          
            <p>
                <label for="unit">Unit:</label>
                <input type="varchar" name="unit" id="Unit">
            </p>
          
          
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>