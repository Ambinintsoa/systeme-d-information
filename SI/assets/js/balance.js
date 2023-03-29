var dataContainer = new Array();
var init = 0;
function createligne(date,Journal,compte,tiers,montant,situation){
    var ligne = document.createElement("tr");
    var construct = `     
    <tr>
        <th scope="col">`+date+`</th>
        <th scope="col">`+Journal+`</th>
        <th scope="col">`+compte+`</th>
        <th scope="col">`+tiers+`</th>`;
        if (situation == 1){
            construct = construct+`<th scope="col">`+montant+`</th><th scope="col"></th>`
        }else{
            console.log(situation);
            construct = construct+`<th scope="col"></th><th scope="col">`+montant+`</th>`
        }
        construct = construct+`</tr>`;
        ligne.innerHTML = construct;
    return ligne;
}
function errormessage(err) {
    var message = document.createElement('div');
    $('.error').empty();
    message.innerHTML = `
    <div class="alert alert-danger alert-dismissible fade show" role="alert">error:`+err+`</div>`;
    $('.error').append(message);
    // setTimeout($('.error').show(), 10000);
}
function successmessage(message) {
    var message = document.createElement('div');
    $('.error').empty();
    message.innerHTML = `
    <div class="alert alert-success alert-dismissible fade show" role="alert">success:`+message+`</div>`;
    $('.error').append(message);
}
function sendform(url,d,journal) {

    
 $('#form').on("submit",function(event ){
   
    event.preventDefault();
    var data = undefined;
    let request =
    $.ajax({
      type: "GET", 	      
      url: url, 
      async: true,
      data : $(this).serialize(),
      success : function(output){
        console.log(output);
        const dat = JSON.parse(output);
        if(dat.status == "true"){
            console.log($('.inite').val());
            var data = {
                date : $('.date').val(),
                journal :journal,
                compte : $('.compte').val(),
                tiers : $('.tiers').val(),
                montant : $('.montant').val(),
                situation : $('.situation').val()
            }
            dataContainer = d;
            var message = successmessage(dat.message);
            sum=0;
            for (let index = 0; index <dataContainer.length; index++) {
                if(dataContainer[index]['situation']==1){
                    sum = sum + Number.parseFloat(dataContainer[index]['montant']);
                }else{
                    sum = sum -  Number.parseFloat(dataContainer[index]['montant']);
                }
            }
            if(sum ==0){
                init = init+1;
                data['init'] = init;
            }else{
                data['init'] = init;
            }
            dataContainer.push(data);
            console.log(dataContainer);
            verif(dataContainer);
            $('.table').append(createligne($('.date').val(),journal,$('.compte').val(),$('.tiers').val(),$('.montant').val(),$('.situation').val()));
        }else{
            console.log(output.message);
            var message = errormessage(dat.message);
        }
      },
      beforeSend: function () {
        //Code à appeler avant l'appel ajax en lui même
      }
    });
    request.done(function (output) {
       
      //Code à jouer en cas d'éxécution sans erreur du script du PHP
    });
    request.fail(function (error) {
       var message =  errormessage(error);

     //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
    });
    request.always(function () {
     //Code à jouer après done OU fail quoi qu'il arrive
    });

});
}
function sendcode(url) {
    $('#code').on("submit",function(event ){
       event.preventDefault();
       let request =
       $.ajax({
         type: "POST", 	      
         url: url, 
         async: true,
         data : $(this).serialize(),
         success : function(output){
           const dat = JSON.parse(output);
           if(dat.status == "true"){
            var message = successmessage(dat.message);
            $('#code').hide();
           }else{
               var message = errormessage(dat.message);
           }
         },
         beforeSend: function () {
           //Code à appeler avant l'appel ajax en lui même
         }
       });
   });
   }
function validate(url){
    $('.btn2').on('click', function(){
        $.post(url,[]).done(function(output) {
            var message = successmessage(output);
          })
          .fail(function(output) {
            var message = errormessage(output);
          })
          .always(function() {
          }); 
    });
   
}
function verif(datas){
dataContainer = datas;
sum=0;
for (let index = 0; index <dataContainer.length; index++) {
    if(dataContainer[index]['situation']==1){
        sum = sum + Number.parseFloat(dataContainer[index]['montant']);
    }else{
        sum = sum -  Number.parseFloat(dataContainer[index]['montant']);
    }
}
console.log(sum);
if(sum ==0){
    let validate = document.createElement('div');   
    validate.innerHTML = `
    <button type="btn" class="btn btn-secondary mb-2 posedit theme-color btn2" >GENERER</button> `;
    $('.auto1').empty();
    $('.auto1').append(validate);
}else{
    $('.auto1').empty();
}
}
