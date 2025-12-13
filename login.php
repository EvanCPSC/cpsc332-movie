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
  <title>Employee Login - Movielations</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="site-header">
    <div class="title-block">
      <h1>Movielations Login</h1>
      <p class="subtitle">CPSC 332 Final Project by The Relationals</p>
      <p class="subtitle small">Adrian Vazquez - Evan Jimenez - AP Calderon - Joshua Artienda - Leighton Hsieh</p>
    </div>
    <nav class="nav">
      <button class="nav-btn" onclick="window.location.href='index.php'">Home</button>
      <button class="nav-btn active" data-section="emplogin">Login</button>
    </nav>
  </header>

  <main class="container">
    <!-- Login -->
    <?php
      $pwd = $email = $emailErr = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }
        
        if (empty($_POST["pwd"])) {
          $pwdErr = "Password is required";
        } else {
          $pwd = test_input($_POST["pwd"]);
        }
        if ($emailErr == "" && $pwdErr == "") {
          $sql = "SELECT Employee_ID FROM employee WHERE (Email = '{$email}' AND Password = '{$pwd}');";
          $result = mysqli_query($sqli, $sql);
          if ($result) {
            header("Location: search.php?empid=".mysqli_fetch_assoc($result)["Employee_ID"]);
            exit();
          }
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <section id="emplogin" class="section visible">
      <h2>Employee Login</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <p>Email: <input type="text" name="email"><br></p>
        <p>Password: <input type="password" name="pwd"><br></p>
        <input type="submit" class="nav-btn">
      </form>
      <br>
      <a href="create_acc.php" class="hlink">Create an Account</a>

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
