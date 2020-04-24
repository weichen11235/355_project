

//delete whole assignment
// function deleteAssignment(id){
//   let assignment_name = $(id).parent().children()[0].innerText;

  //drop table
  // let xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     console.log(this.responseText)
  //   }
  // };
  // xhttp.open("POST", "dropTable.php", true);
  // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // xhttp.send("assignment_name="+assignment_name);

  //remove button and content
  // let assignmentArray = Array.from($('#assignList').children());
  // assignmentArray.forEach(function(assignment){
  //   if(assignment.innerText == assignment_name){
  //     assignment.remove();
  //   }
  // })
  // id.parentElement.remove();

  //delete data in local storage
//   let storage;
//   if(localStorage.getItem('nameContainer') === null){
//     storage = [];
//   }
//   else{
//     storage = JSON.parse(localStorage.getItem('nameContainer'));
//   }
//   storage.forEach(function(name, index){
//     if(name == assignment_name){
//       storage.splice(index, 1);
//     }
//   })
//   localStorage.setItem('nameContainer', JSON.stringify(storage));
// }    


//create a table for assignment
// function createTable(id){
//   $(id).attr('disabled', true);
//   let xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       console.log(this.responseText);
//     }
//   };
//   xhttp.open("POST", "createDB.php", true);
//   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhttp.send("assignment_name="+$(id).prev().val());
// }


//insert record after send a question
function insertRecord(id) {
  $(id).attr('disabled', true);
  if($($(id).parent().children()[2]).children().length === 3){
    let question = $(id).prev().children()[0].value;
    let answer = $(id).prev().children()[1].value;
    let score = $(id).prev().children()[2].value;
    let type = 'WA';
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      }
    };
    xhttp.open("POST", "insertQ.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`question=${question}&answer=${answer}&score=${score}&type=${type}`);
  
  }
  else if($($(id).parent().children()[2]).children().length > 3){
    $(id).attr('disabled', true);
    let question = $(id).prev().children()[0].value;
    let choiceA = $(id).prev().children()[1].value;
    let choiceB = $(id).prev().children()[2].value;
    let choiceC = $(id).prev().children()[3].value;
    let answer = $(id).prev().children()[4].value;
    let score = $(id).prev().children()[5].value;
    let type = 'MC';
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      }
    };
    xhttp.open("POST", "insertQ.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`question=${question}&answer=${answer}&score=${score}&type=${type}&choiceA=${choiceA}&choiceB=${choiceB}&choiceC=${choiceC}`);
    
  }
}


//send data and append a button
// function finishUp(id) {
//   insertRecord($(id));
//   let form = $(id).parents()[1];
//   let assignName = $($(form).children()[0]).children()[0].value;
//   storeToLocal(assignName);
//   $('#assignList').append(`<button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="getRecord(this)">${assignName}</button>`);
// }


//store assignment name to local storage
// function storeToLocal(assignment_name){
//   let storage;
//   if(localStorage.getItem('nameContainer') === null){
//     storage = [];
//   }
//   else{
//     storage = JSON.parse(localStorage.getItem('nameContainer'));
//   }

//   storage.push(assignment_name);
//   localStorage.setItem('nameContainer', JSON.stringify(storage));

// }


//get record from database when click assignment btn
// function getRecord(id){
//   let xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       $('#assignPanel').html(this.responseText);
//     }
//   };
//   xhttp.open("POST", "getDB.php", true);
//   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhttp.send("assignment_name="+id.innerText);
// }