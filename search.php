<!doctype html>
<html lang="en">
  <?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "MovieDB";
    $port = 3306;

    $sqli = mysqli_connect($hostname, $username, $password, $database, $port);

    if (!$sqli) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
  ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Movie Search - Movielations</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="site-header">
    <div class="title-block">
      <?php
        $empid = $_GET["empid"];
        $empname = mysqli_query($sqli, "SELECT Name FROM employee WHERE Employee_ID = '{$empid}'");
        echo "<h1>Welcome ".mysqli_fetch_assoc($empname)["Name"]."</h1>";
      ?>
      <p class="subtitle">Movielations by The Relationals</p>
      <p class="subtitle small">Adrian Vazquez - Evan Jimenez - AP Calderon - Joshua Artienda - Leighton Hsieh</p>
    </div>
    <nav class="nav">
      <button class="nav-btn" onclick="window.location.href='index.php'">Home</button>
      <button class="nav-btn active" onclick="window.location.href='search.php'">Search</button>
    </nav>
  </header>

  <main class="container">
    <!-- Movie Search -->
    <section id="search" class="section visible">
      <h2>Movie Search</h2>
      
    </section>

  </main>
  <footer class="site-footer">
    <p>Movielations - The Relationals</p>
  </footer>

  <script src="scripts.js"></script>
</body>
<?php
mysqli_close($sqli);
?>
</html>
