<?php    

  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: ../logIn_signUp/sign_in.php");
    die;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../inc/head.php'; ?>
  <title>Assignment</title>
</head>
<body onload="getAllAssignments()">
  <?php include '../inc/nav2.php'; ?>  

  <!-- assignment page -->
  <div class="container-fluid ">
      <div class="row">

        <!-- assignment list panel-->
        <div class="col-lg-3 vh-100 bg-secondary px-0 overflow-auto" id="assignList">
        </div>

        <!-- questions panel -->

        <div class="col-lg-9 vh-100 overflow-auto" id="qPanel">
          <h1 class = "text-center pt-5">Welcome</h1>
          <p class = "text-center">Please click the "help" link to read the guide first, make sure you understand how does it work before using.</p>
        </div>

      </div>
    </div>
  <?php include '../inc/bjs.php'; ?>
  <script src="table.js"></script>
  <script>
    function getAllAssignments(){
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          $('#assignList').html(this.responseText);
        }
      };
      xhttp.open("GET", "getAllAssignment.php", true);
      xhttp.send();
    }

    function getData(id){
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          $('#qPanel').html(this.responseText);
        }
      };
      xhttp.open("POST", "getQuestions.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(`title=${$(id).text()}`);
    }

    function sendAnswer(id){
      let title = id.parentElement.parentElement.children[0].innerText;
      let question = id.parentElement.children[0].innerText;
      if(id.parentElement.childElementCount == 3) {

        let answer = id.previousElementSibling.value;
        id.previousElementSibling.setAttribute('disabled', 'true');
        id.setAttribute('disabled', 'true');
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("POST", "sendAnswer.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`answer=${answer}&title=${title}&question=${question}`);
      } 
      else{
        let children = id.parentElement.children;
        let A = children[1].firstElementChild.firstElementChild.value;
        children[1].firstElementChild.firstElementChild.setAttribute('disabled', 'true');
        let B = children[2].firstElementChild.firstElementChild.value;
        children[2].firstElementChild.firstElementChild.setAttribute('disabled', 'true');
        let C = children[3].firstElementChild.firstElementChild.value;
        children[3].firstElementChild.firstElementChild.setAttribute('disabled', 'true');
        id.setAttribute('disabled', 'true');
        let answer;
        
        if(children[1].firstElementChild.firstElementChild.checked == true){
          answer = children[1].firstElementChild.firstElementChild.value;
        }
        else if(children[2].firstElementChild.firstElementChild.checked == true){
          answer = children[2].firstElementChild.firstElementChild.value;
        }
        else if(children[3].firstElementChild.firstElementChild.checked == true){
          answer = children[3].firstElementChild.firstElementChild.value;
        }
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("POST", "sendAnswer.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`A=${A}&B=${B}&C=${C}&answer=${answer}&title=${title}&question=${question}`);
          
      }
    }

    function getScore(){
      let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            $('#qPanel').html(this.responseText);
          }
        };
        xhttp.open("GET", "getScore.php", true);
        xhttp.send();
    }
  </script>
</body>
</html>