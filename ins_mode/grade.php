<?php    

  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    die;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../inc/head.php'; ?>
  <title>Gradebook</title>
</head>
<body>
  <?php include '../inc/nav2.php'; ?>  
  <main class='bg-light min-vh-100 container-fluid pt-5 overflow-auto'>
    <table class='table table-borderless table-hover'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Assignment 1</th>
          <th>Assignment 2</th>
          <th>Assignment 3</th>
          <th>Assignment 4</th>
          <th>Assignment 5</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Json Wang</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Logan Johnson</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Tony Smith</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Kenny Smith</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Ola Jones</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Jane Wilson</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
        <tr>
          <td>Jennifer Carter</td>
          <td>80</td>
          <td>56</td>
          <td>77</td>
          <td>98</td>
          <td>77</td>
        </tr>
      </tbody>
    </table>
  </main>
  
  <?php include '../inc/bjs.php'; ?>
</body>
</html>