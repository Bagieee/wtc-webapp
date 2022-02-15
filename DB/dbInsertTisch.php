<html>
    <body>
      <form action="./Interface/insertTisch.php" method="post">
      Tisch Nr.: <input type="text" name="nummer"><br>
      Raum: 
      <select name="raumId">
      <?php
          require_once("dbCon.php");
          $stmt = $pdo->prepare("SELECT * FROM tblraum");
          $stmt->execute();      
          foreach ($stmt->fetchAll() as $row){
            echo "<option value='" .$row['raumId'] . "'>" . $row['raumBezeichnung'] . "</option>";
          }
      ?>
      </select>
      <input type="submit">
      </form>

      <?php



      ?>
    </body>
</html>