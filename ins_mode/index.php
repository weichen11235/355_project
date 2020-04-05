<?php    
  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: ../logIn_signUp/sign_in.php");
    die;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body>
    <?php include '../inc/nav2.php'; ?>

    <!-- assignment page -->
    <div class="container-fluid">
      <div class="row">

        <!-- assignment list panel-->
        <div id='assignList' class="col-lg-3 vh-100 bg-secondary overflow-auto px-0">
          <button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="createAssignment()">Create New Assignment</button>
        </div>
        
        <!-- assignment create panel -->
        <div id="assignPanel" class="col-lg-9 vh-100 overflow-auto">
          <form  id='createForm' class="w-50 shadow mx-auto p-5 my-5">
            <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
            <input type="button" value="Start Create" class="w-100" id="createBtn" onclick="startCreate()">
          </form>
          <form  id='questionList' class='w-50 mx-auto'></form>
        </div>

      </div>
    </div>
    <?php include '../inc/bjs.php'; ?>
    <script src="table.js"></script>
    <script src="contentManipulate.js"></script>
    <script>
      //delete individual question
      function qDelete(id){
        let name = $($(id).parent().parent().parent()).children()[0].innerText;
        let qID = $('#qID').text();
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
          }
        };
        xhttp.open("POST", "delete_update.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`assignment_name=${name}&qID=${qID}`);

        id.parentElement.parentElement.remove();

      //   let formChildren = Array.from($(id).parent().parent().parent().children());
      //   if(formChildren.length === 3){
      //     let assignList = Array.from($('#assignList').children())

      //     let storage;
      //     if(localStorage.getItem('nameContainer') === null){
      //       storage = [];
      //     }
      //     else{
      //       storage = JSON.parse(localStorage.getItem('nameContainer'));
      //     }
      //     storage.forEach(function(item, index){
      //       if(item == name){
      //         storage.splice(index, 1);
      //       }
      //     })
      //     localStorage.setItem('nameContainer', JSON.stringify(storage));

      //     assignList.forEach(function(btn){
      //       if(btn.innerText === name){
      //         btn.remove();
      //       }
      //     })
      //     $('#assignPanel').empty();
      //   } else{
      //     id.parentElement.parentElement.remove();
      //   }

        
      }

      //update individual question
      function qUpdate(id){
        let inputContainer = Array.from($(id).parent().parent().children());
        
        if(inputContainer.length === 5){
          let name = $($(id).parent().parent().parent()).children()[0].innerText;
          let qID = $('#qID').text();
          let question = inputContainer[1].value;
          let answer = inputContainer[2].value;
          let score= inputContainer[3].value;

          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText)
            }
          };
          xhttp.open("POST", "delete_update.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(`assignment_name=${name}&qID=${qID}&question=${question}&answer=${answer}&score=${score}&updateFillIn='yes'`);
        }
        else{
          let name = $($(id).parent().parent().parent()).children()[0].innerText;
          let qID = $('#qID').text();
          let question = inputContainer[1].value;
          let A = inputContainer[2].value;
          let B = inputContainer[3].value;
          let C = inputContainer[4].value;
          let D = inputContainer[5].value;
          let answer = inputContainer[6].value;
          let score= inputContainer[7].value;
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText)
            }
          };
          xhttp.open("POST", "delete_update.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send(`assignment_name=${name}&qID=${qID}&question=${question}&choiceA=${A}&choiceB=${B}&choiceC=${C}&choiceD=${D}&answer=${answer}&score=${score}`);
        }
      }
    </script>
  </body>
</html>