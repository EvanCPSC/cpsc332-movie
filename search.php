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
    

    $search_query = "SELECT Movie, Show_Date, Start_Time, End_Time, Cinema, Auditorium, Format FROM showtime WHERE Showtime_ID >= 0 ";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $title = $_POST["title"];
      $loc = $_POST["location"];
      $date = $_POST["date"];
      $time = $_POST["showtime"];
      $empidp = $_POST["empid"];
      if (!empty($title)) {
        $search_query .= "AND LOCATE(TRIM('{$title}'), Movie) = 1";
      }
      if (!empty($loc)) {
        $search_query .= "AND LOCATE(TRIM('{$loc}'), Cinema) = 1";
      }
      if (!empty($date)) {
        $search_query .= "AND LOCATE('{$date}', Show_Date) = 1";
      }
      if ($time != "default") {
        $search_query .= "AND Start_Time = '{$time}'";
      }
    }
    $search_query .= ";";
    $search_result = mysqli_query($sqli,$search_query);

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
        $empid = $_GET['empid'] ?? $_POST['empid'] ?? null;
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
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <p>
          <input type="hidden" name="empid" value="<?php echo $empid; ?>">
          <input type="text" name="title" placeholder="Title">
          <input type="text" name="location" placeholder="Cinema">
          <input type="date" name="date" placeholder="Date">
          <select id="showtime" name="showtime">
            <option value="default" selected>Showtime</option>
            <?php
              for ($i = 10; $i <= 20; $i++) {
                echo "<option value=\"".$i.":00:00\">".$i.":00:00</option>";
              }
            ?>
          </select>
          <input type="submit" class="nav-btn">
        </p>
      </form>
      <!-- Movie Table -->
      <table>
        <tr>
            <!-- Column Headers -->
            <?php
              $columns = mysqli_fetch_fields($search_result);
              foreach ($columns as $col) {
                  echo "<th>{$col->name}</th>";
              }
            ?>
        </tr>
          <!-- Table Rows -->
          <?php
            mysqli_data_seek($search_result, 0);
            while ($row = mysqli_fetch_assoc($search_result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
          ?>
      </table>
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
