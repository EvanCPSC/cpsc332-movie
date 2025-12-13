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
  <title>Movielations</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="site-header">
    <div class="title-block">
      <h1>Movielations Create Account</h1>
      <p class="subtitle">CPSC 332 Final Project by The Relationals</p>
      <p class="subtitle small">Adrian Vazquez - Evan Jimenez - AP Calderon - Joshua Artienda - Leighton Hsieh</p>
    </div>
    <nav class="nav">
      <button class="nav-btn" onclick="window.location.href='index.php'">Home</button>
      <button class="nav-btn active" data-section="createacc">Create Account</button>
    </nav>
  </header>

  <main class="container">
    <!-- Create Account -->
    <?php
      $pwd = $email = $name = $addr = $phone = $role = "";
      $pwdErr = $emailErr = $nameErr = $addrErr = $phoneErr = "";

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
          $pwdErr = "Please Create a Password";
        } else {
          $pwd = test_input($_POST["pwd"]);
        }

        if (empty($_POST["name"])) {
          $nameErr = "Please Enter a Name";
        } else {
          $name = test_input($_POST["pwd"]);
        }

        if (empty($_POST["address"])) {
          $addrErr = "Please Enter an Address";
        } else {
          $addr = test_input($_POST["address"]);
        }

        if (empty($_POST["phone"])) {
          $phoneErr = "Please Enter a Phone Number";
        } else {
          $phone = test_input($_POST["phone"]);
        }



        if ($emailErr == "" && $pwdErr == "" && $nameErr == "" && $addrErr == "" && $phoneErr == "") {
          $sql = "INSERT INTO employee (Name, Email, Address, Phone_Number, Password)
            VALUES ('{$name}', '{$email}', '{$addr}', '{$phone}', '{$pwd}');";
          $result = mysqli_query($sqli, $sql);
          if ($result) {
            header("Location: login.php");
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

    <section id="createacc" class="section visible">
      <h2>Create an Employee Account</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <p>Full Name: <input type="text" name="name"><br></p>
        <p>Email: <input type="text" name="email"><br></p>
        <p>Create Password: <input type="password" name="pwd"><br></p>
        <p>Address: <input type="text" name="address"><br></p>
        <p>Phone Number: <input type="text" name="phone"><br></p>
        <p>Role: 
            <select id="roles" name="role">
                <option value="concessions" selected>Concessions</option>
                <option value="ticketing">Ticketing</option>
                <option value="technician">Technician</option>
                <option value="usher">Usher</option>
                <option value="manager">Theater Manager</option>
            </select><br>
        </p>
        <input type="submit" class="nav-btn">
      </form>
      <br>
      <a href="login.php" class="hlink">Log into Existing Account</a>

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
