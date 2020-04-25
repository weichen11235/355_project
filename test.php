<?php
  if(isset($_POST['optradio'])){
    echo $_POST["optradio"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
<div class="container">
  <h2>Form control: radio buttons</h2>
  <p>The form below contains three radio buttons. The first option is checked by default, and the last option is disabled:</p>
  <form action="test.php" method="post">
  <div class='form-group shadow p-3 mb-5'>
    <p>what is this?</p>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" >Option 1
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Option 2
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" value="kk" name="optradio">Option 3
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
</body>
</html>