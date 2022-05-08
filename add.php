<?php
require "header.php";
include_once "db.php";

if (isset($_POST['Submit'])) {
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);

  if (empty($name) || empty($email)) {

    if (empty($name)) {
      $nameEr = "Name is empty";
    }
    if (empty($email)) {
      $emailEr = "Email is empty.";
    }
    if (empty($name) || empty($email)) {
      $bac = "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    $msg= `<div class="alert alert-warning">
      echo "$nameEr";
      echo "$emailEr";
      echo "$bac";
  </div>`;
  } else {

    $result = mysqli_query($mysqli, "INSERT INTO etudiant(name,email) VALUES('$name','$email')");

    echo "<font color='green'>Data added successfully.";
    echo "<br/><a href='index.php'>View Result</a>";
  }
}
?>
<html>

<head>
  <title>Add Data</title>
  <style>
    .center {
      display: flex;
      justify-content: center;


    }
  </style>
</head>

<body>


  <form class="form" action="add.php" method="post" name="form1">


    <table class="table col-5 center mt-5  table-hover">
      <td colspan="3">
        <?php $msg ?>
      </td>
      <tr>
        <td>Name</td>
        <td><input class="form-control" type="text" name="name"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input class="form-control" type="text" name="email"></td>
      </tr>
      <tr>
        <td></td>
        <td><input class="form-control" type="submit" name="Submit" value="Add"></td>
      </tr>

    </table>

  </form>





  















  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>