<?php



############################
##   BY: SÍLVIO SILVA     ##
##   02/09/2022           ##
############################


require "./app/connection.php";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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
          <li class="nav-item active">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.html">Add</a>
          </li>
        </ul>
        <a class="btn btn-info" href="index.html" onclick="logOut()">Log Out</a>
    </nav>
  </div>
  <div class="container-fluid">
    <h1 class="dashboard-title">Developer Details</h1>
  </div>
  <div class="data">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Operation</th>
        </tr>
      </thead>

      <?php
      $query = $pdo->prepare("SELECT * FROM developerdetails");
      $query->execute();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      ?>

        <tbody>
          <tr>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
              <a href="devDetails.php?devdetails=<?php echo $row['id']; ?>" class="badge badge-primary">Read</a>
              <a href="update.php?updateid=<?php echo $row['id']; ?>" class="badge badge-success">Update</a>
              <a href="delete.php?deleteid=<?php echo $row['id']; ?>" class="badge badge-danger delme" data-confirm="Are you sure you want to delete this item?">Delete</a>
            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $('A[data-confirm]').on("click", function(e) {
      e.preventDefault();

      var choice = confirm($(this).attr('data-confirm'));

      if (choice) {
        window.location.href = $(this).attr('href');
      }
    });
  </script>
</body>

</html>