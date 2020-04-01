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
        <div class="col-lg-3 vh-100 bg-secondary overflow-auto">
          <a href="index.php" class="text-white d-block text-center py-3 border-bottom border-white">Create New Assignment</a>
        </div>
        

        <!-- assignment create panel -->
        <div class="col-lg-9 vh-100 overflow-auto">
          <form  id='createForm' class="w-50 shadow mx-auto p-5 my-5">
            <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
            <input type="button" value="Start Create" class="w-100" id="createBtn">
          </form>
          <div id='questionList' class='w-50 mx-auto'></div>
        </div>

      </div>
    </div>

    <?php include '../inc/bjs.php'; ?>
    <script>
      function createTable(id){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
          }
        };
        xhttp.open("POST", "createDB.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("assignment_name="+$(id).prev().val());
        
      }
     
      $('#createBtn').click(function() {
        if($('#questionList').children()){
          $('#questionList').empty();
        }
        
        let qNumber = Number($('#qNumber').val());
        let qList = `
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class='form-group shadow p-3 mb-5'>
            <input type="text" name="assignment_name" id="assignment-name" class="form-control mb-2" placeholder="enter the name of assignment (required)" required>
            <input type="button" value="Send" class="w-100" name="submit" onclick="createTable(this)">
          </form>`;
        for(let i = 1; i <= qNumber; i++) {
          qList += `
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class='form-group shadow p-3 mb-5'>
            <p>Question ${i}</p>
            <select name="q_type" class="form-control mb-2" id="" onchange='changeOption(this)'>
              <option value="fill_in">Create Fill-in-Blank Question</option>
              <option value="multiple_choice">Create Multiple Choice Qestion</option> 
            </select>
            <div>
              <input type="text" name="question" class='form-control mb-2' placeholder='enter question' required>
              <input type="text" name="answer" class='form-control mb-2' placeholder='enter answer' required>
              <input name="score" type="number" class='form-control mb-2' placeholder='enter score of this question'>
            </div>
            <input type="button" value="Send" class="w-100" name="submit" onclick="createTable(this)">
          </form>
          `;
        }
        $('#questionList').append(qList);
      })

      function changeOption(option) {
        if(option.value === 'multiple_choice') {
          $(option).next().empty();
          $(option).next().html(`
            <input name="question" type="text" class='form-control mb-2' placeholder='enter question'required>
            <input name="choiceA" type="text" class='form-control mb-2' placeholder='enter choice A' required>
            <input name="choiceB" type="text" class='form-control mb-2' placeholder='enter choice B' required>
            <input name="choiceC" type="text" class='form-control mb-2' placeholder='enter choice C' required>
            <input name="choiceD" type="text" class='form-control mb-2' placeholder='enter choice D' required>
            <select name="answer" class="form-control mb-2" id="">
              <option>Which choice is correct</option>
              <option value="A">Choice A</option>
              <option value="B">Choice B</option>
              <option value="C">Choice C</option>
              <option value="D">Choice D</option>
            </select>
            <input name="score" type="number" class='form-control mb-2' placeholder='enter score of this question' required>`)
        } else {
          $(option).next().empty();
          $(option).next().html(`
            <input name="question" type="text" class='form-control mb-2' placeholder='enter question' required>
            <input name="answer" type="text" class='form-control mb-2' placeholder='enter answer' required>`);
        }
      }
    </script>
  </body>
</html>