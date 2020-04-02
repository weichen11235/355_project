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

function insertRecord(id) {
  $(id).attr('disabled', true);
  if($($(id).parent().children()[2]).children().length === 3){
    let form = $(id).parents()[1];
    let assignName = $($(form).children()[0]).children()[0].value;
    let question = $(id).prev().children()[0].value;
    let answer = $(id).prev().children()[1].value;
    let score = $(id).prev().children()[2].value;
    let type = 'fill_in';
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      }
    };
    xhttp.open("POST", "insertDB.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`assignment_name=${assignName}&question=${question}&answer=${answer}&score=${score}&type=${type}`);
  
  }
  else if($($(id).parent().children()[2]).children().length > 3){
    $(id).attr('disabled', true);
    let form = $(id).parents()[1];
    let assignName = $($(form).children()[0]).children()[0].value;
    let question = $(id).prev().children()[0].value;
    let choiceA = $(id).prev().children()[1].value;
    let choiceB = $(id).prev().children()[2].value;
    let choiceC = $(id).prev().children()[3].value;
    let choiceD = $(id).prev().children()[4].value;
    let answer = $(id).prev().children()[5].value;
    let score = $(id).prev().children()[6].value;
    let type = 'multiple_choice';
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      }
    };
    xhttp.open("POST", "insertDB.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`assignment_name=${assignName}&question=${question}&answer=${answer}&score=${score}&type=${type}&choiceA=${choiceA}&choiceB=${choiceB}&choiceC=${choiceC}&choiceD=${choiceD}`);
    
  }
}

function finishUp(id) {
  insertRecord($('#finish'));
  let assignName = $($(id).children()[0]).children()[0].value;
  $('#assignList').append(`<a href="index.php" class="text-white d-block text-center py-3 border-bottom border-white">${assignName}</a>`)
}