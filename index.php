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
    $password = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["email"]);
      $email = test_input($_POST["password"]);
    }

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
  <title>Movielations</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="site-header">
    <div class="title-block">
      <h1>Movielations</h1>
      <p class="subtitle">CPSC 332 Final Project by The Relationals</p>
      <p class="subtitle small">Adrian Vazquez - Evan Jimenez - AP Calderon - Joshua Artienda - Leighton Hsieh</p>
    </div>
    <nav class="nav">
      <button class="nav-btn active" data-section="overview">Overview</button>
      <button class="nav-btn" data-section="schema">Schema</button>
      <button class="nav-btn" data-section="emplogin">Login</button>
    </nav>
  </header>

  <main class="container">
    <!-- Overview -->
    <section id="overview" class="section visible">
      <h2>Overview</h2>
      <p>
        This website is a simple demo of our <strong>MovieDB</strong> cinema database.
        It shows the structure of our tables, how we populate them with sample data, and
        the views we created to answer typical business questions.
      </p>
      <ul class="bullet-list">
        <li><strong>CINEMA</strong> - theater locations.</li>
        <li><strong>AUDITORIUM</strong> - rooms inside each cinema.</li>
        <li><strong>MOVIE</strong> - films being shown.</li>
        <li><strong>SHOWTIME</strong> - specific screenings (date, time, format).</li>
      </ul>
      <p>
        In a live demo, we would run this SQL in MySQL Workbench, show the tables,
        insert the data, and then run queries and views to display results.
      </p>
    </section>

    <!-- Schema -->
    <section id="schema" class="section">
      <h2>Database Schema</h2>

      <div class="card-grid">
        <article class="card">
          <h3>CINEMA</h3>
          <p><strong>Primary Key:</strong> Name</p>
          <ul>
            <li>Name (VARCHAR(25))</li>
            <li>Street_Number (VARCHAR(45))</li>
            <li>City (VARCHAR(30))</li>
            <li>State (VARCHAR(20))</li>
            <li>Zip_Code (CHAR(5))</li>
            <li>Employees (INT)</li>
          </ul>
          <p class="note">One cinema has many auditoriums.</p>
        </article>

        <article class="card">
          <h3>AUDITORIUM</h3>
          <p><strong>Primary Key:</strong> Name</p>
          <ul>
            <li>Name (VARCHAR(20))</li>
            <li>Capacity (INT)</li>
            <li>Cinema_Name (VARCHAR(25))</li>
            <li>Three_D_Support (BOOLEAN)</li>
            <li>IMAX_Support (BOOLEAN)</li>
          </ul>
          <p class="note">Each auditorium belongs to one cinema.</p>
        </article>

        <article class="card">
          <h3>MOVIE</h3>
          <p><strong>Primary Key:</strong> Title</p>
          <ul>
            <li>Title (VARCHAR(50))</li>
            <li>Year (CHAR(4))</li>
            <li>Duration (CHAR(5))</li>
            <li>Rating (VARCHAR(5))</li>
            <li>Release_Date (DATE)</li>
            <li>Genre (VARCHAR(15))</li>
            <li>Description (VARCHAR(300))</li>
          </ul>
          <p class="note">A movie can appear in many showtimes.</p>
        </article>

        <article class="card">
          <h3>SHOWTIME</h3>
          <p><strong>Primary Key:</strong> Showtime_ID</p>
          <ul>
            <li>Showtime_ID (INT)</li>
            <li>Auditorium (VARCHAR(20))</li>
            <li>Movie (VARCHAR(50))</li>
            <li>Show_Date (DATE)</li>
            <li>Start_Time (TIME)</li>
            <li>End_Time (TIME)</li>
            <li>Format (VARCHAR(8))</li>
          </ul>
          <p class="note">
            Connects a movie and an auditorium at a specific date and time.
          </p>
        </article>
      </div>
    </section>

    <!-- Login -->
    <section id="emplogin" class="section">
      <h2>Employee Login</h2>
      <form action="search.php" method="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>Name: <input type="text" name="name"><br></p>
        <p>E-mail: <input type="text" name="email"><br></p>
        <input type="submit" class="nav-btn">
      </form>

      <a href="create_acc.php">Create an Account</a>

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
