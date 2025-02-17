<?php



############################
##   BY: SÍLVIO SILVA     ##
##   02/09/2022           ##
############################


include "./app/connection.php";
include "./app/helpers.php";
$read_details = filter($_GET['devdetails']);
$query = $pdo->prepare("SELECT * FROM developerdetails WHERE id = ?");
$query->bindParam(1, $read_details);
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
  $update_id = filter($row['id']);
  $firstName = filter($row['firstName']);
  $lastName = filter($row['LastName']);
  $email = filter($row['email']);
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Details</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script type="text/javascript">
    function logOut() {
      alert("You have been logged out");
    }
  </script>
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="dashboard.php"><img src="img/hero.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
          <li class="nav-item">
            <a class="nav-link" href="add.html">Add</a>
          </li>
        </ul>
        <a class="btn btn-info" href="index.html" onclick="logOut()">Log Out</a>
    </nav>
  </div>

  <h1 class="dashboard-title">Dev Details</h1>

  <div class="container_fluid">
    <p class="data">Hi! <br>
      My name is <b><?php echo $firstName;
                    echo ' ';
                    echo $lastName; ?></b>. My employee id is <b><?php echo $update_id; ?></b>. You can contact me at
      <a href="mailto:"><b><?php echo $email; ?></b></a>.
    </p>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>