<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body>
    <?php include '../inc/nav2.php'; ?>

    <!-- assignment page -->
    <div class="container-fluid ">
      <div class="row">

        <!-- assignment list panel-->
        <div class="col-lg-3 min-vh-100 bg-secondary">
          <a href="#" class="text-white d-block text-center py-3 border-bottom border-white">Create New Assignment</a>
        </div>

        <!-- assignment create panel -->
        <div class="col-lg-9 min-vh-100">
          <form method='POST' id='createForm' action="" class="w-50 shadow mx-auto p-5 my-5">
            <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
            <input type="button" value="Start Create" class="w-100" id="createBtn">
          </form>
          <form action="" method="POST" id='questionList' class='w-50 mx-auto'>
          </form>
        </div>

      </div>
    </div>

    <?php include '../inc/bjs.php'; ?>
    <script>
      $('#createBtn').click(function() {
        if($('#questionList').children()){
          $('#questionList').empty();
        }
        let assignmentName = $('#assignment-name').value;
        let qNumber = Number($('#qNumber').val());
        let qList = `
          <div class='form-group shadow p-3 mb-5'>
            <input type="text" name="" id="assignment-name" class="form-control mb-2" placeholder="enter the name of assignment">
            <input type="number" name="" id="total-score" class="form-control mb-2" placeholder="enter the total score of the assignment">
          </div>`;
        for(let i = 1; i <= qNumber; i++) {
          qList += `
          <div class='form-group shadow p-3 mb-5'>
            <p>Question ${i}</p>
            <select class="form-control mb-2" id="" onchange='changeOption(this)'>
              <option>Create Fill-in-Blank Question</option>
              <option>Create Multiple Choice Qestion</option> 
            </select>
            <div>
              <input type="text" class='form-control mb-2' placeholder='enter question'>
              <input type="text" class='form-control mb-2' placeholder='enter answer'>
              <input type="number" class='form-control mb-2' placeholder='enter score of this question'>
            </div>
          </div>`;
        }
        qList += `<input type="submit" value="Finish & Submit" class='w-100 mb-5'>`;
        $('#questionList').append(qList);
      })

      function changeOption(option) {
        if(option.value === 'Create Multiple Choice Qestion') {
          $(option).next().empty();
          $(option).next().html(`
            <input type="text" class='form-control mb-2' placeholder='enter question'>
            <input type="text" class='form-control mb-2' placeholder='enter choice A'>
            <input type="text" class='form-control mb-2' placeholder='enter choice B'>
            <input type="text" class='form-control mb-2' placeholder='enter choice C'>
            <input type="text" class='form-control mb-2' placeholder='enter choice D'>
            <select class="form-control mb-2" id="">
              <option>Which choice is correct</option>
              <option>Choice A</option>
              <option>Choice B</option>
              <option>Choice C</option>
              <option>Choice D</option>
            </select>
            <input type="number" class='form-control mb-2' placeholder='enter score of this question'>`)
        } else {
          $(option).next().empty();
          $(option).next().html(`
            <input type="text" class='form-control mb-2' placeholder='enter question'>
            <input type="text" class='form-control mb-2' placeholder='enter answer'>`);
        }
      }
    </script>
  </body>
</html>