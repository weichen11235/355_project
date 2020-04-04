//append assignment btn when load the page
document.addEventListener('DOMContentLoaded', loadBtn);
function loadBtn() {
  let storage;
  if(localStorage.getItem('nameContainer') === null){
    storage = [];
  }
  else{
    storage = JSON.parse(localStorage.getItem('nameContainer'));
  }
  storage.forEach(function(name){
    $('#assignList').append(`<button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="getRecord(this)">${name}</button>`);
  })
  
}
//click cerate assignment btn to add assignment
function createAssignment(){
  $('#assignPanel').html(`
    <form  id='createForm' class="w-50 shadow mx-auto p-5 my-5">
      <input type="number" name="" id="qNumber" class="form-control mb-2" placeholder="enter number of questions you want to create">
      <input type="button" value="Start Create" class="w-100" id="createBtn" onclick="startCreate()">
    </form>
    <form id='questionList' class='w-50 mx-auto'></form>`);
}

//show up the create question UI form
function startCreate() {
  if($('#questionList').children()){
    $('#questionList').empty();
  }
  
  let qNumber = Number($('#qNumber').val());

  //enter assignment name
  let qList = `
    <div class='form-group shadow p-3 mb-5'>
      <input type="text" name="assignment_name" id="assignment-name" class="form-control mb-2" placeholder="enter the name of assignment (required)" required>
      <input type="button" value="Send" class="w-100" name="submit" onclick="createTable(this)">
    </div>`;

  //create question
  for(let i = 1; i <= qNumber; i++) {
    qList += `
    <div class='form-group shadow p-3 mb-5'>
      <p>Question ${i}</p>
      <select name="q_type" class="form-control mb-2" id="" onchange='changeOption(this)'>
        <option value="fill_in" selected>Create Fill-in-Blank Question</option>
        <option value="multiple_choice">Create Multiple Choice Qestion</option> 
      </select>
      <div>
        <input type="text" name="question" class='form-control mb-2' placeholder='enter question' required>
        <input type="text" name="answer" class='form-control mb-2' placeholder='enter answer' required>
        <input name="score" type="number" class='form-control mb-2' placeholder='enter score of this question' required>
      </div>`;
      if(i === Number($('#qNumber').val())) {
        qList += `<input id="finish" type="button" value="Finish" class="w-100" name="submit" onclick="finishUp(this)"></div>`;
      } else {
        qList += `<input type="button" value="Send" class="w-100" name="submit" onclick="insertRecord(this)"></div>`;
      }
      
  }
  $('#questionList').append(qList);
}

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