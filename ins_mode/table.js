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
function finishUp(id) {
  insertRecord($(id));
  let title = id.parentElement.parentElement.previousElementSibling.children[1].value;
  storeToLocal(title);
  $('#assignList').append(`<button type="button" class="btn btn-secondary d-block text-left w-100 p-3 rounded-0" onclick="getQuestion(this)">${title}</button>`);
}


//store assignment name to local storage
function storeToLocal(assignment_name){
  let storage;
  if(localStorage.getItem('nameContainer') === null){
    storage = [];
  }
  else{
    storage = JSON.parse(localStorage.getItem('nameContainer'));
  }

  storage.push(assignment_name);
  localStorage.setItem('nameContainer', JSON.stringify(storage));

}