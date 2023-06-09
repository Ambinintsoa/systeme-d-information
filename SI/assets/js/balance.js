var dataContainer = new Array();
var init = 0;
var comptest = 0;
function createligne(date, Journal, compte, tiers, montant, situation,id,url,ref) {
    var ligne = document.createElement("tr");
    var construct = `     
    <tr>
        <th scope="col">`+ date + `</th>
        <th scope="col">`+ Journal + `</th>
        <th scope="col">`+ compte + `</th>
        <th scope="col">`+ tiers + `</th>
        <th scope="col">`+ ref + `</th>`;
    if (situation == 1) {
        construct = construct + `<th scope="col">` + montant + `</th><th scope="col"></th>`
    } else {
        console.log(situation);
        construct = construct + `<th scope="col"></th><th scope="col">` + montant + `</th>`
    }
    construct = construct + `
    <th scope="col">
    <a href="` +url +id +  `" class="accent checkboxHover" style="margin-left: 5px;" ><i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></a>
  </th>
    </tr>`;
    ligne.innerHTML = construct;
    return ligne;
}
function errormessage(err) {
    var message = document.createElement('div');
    $('.error').empty();
    message.innerHTML = `
    <div class="alert alert-danger alert-dismissible fade show" role="alert">error:`+ err + `</div>`;
    $('.error').append(message);
    // setTimeout($('.error').show(), 10000);
}
function successmessage(message) {
    var message = document.createElement('div');
    $('.error').empty();
    message.innerHTML = `
    <div class="alert alert-success alert-dismissible fade show" role="alert">success:`+ message + `</div>`;
    $('.error').append(message);
}
function sendform(url, d, journal,urlbase) {


    $('#form').on("submit", function (event) {
        sum = 0;
        for (let index = 0; index < d.length; index++) {
            if (d[index]['situation'] == 1) {
                sum = sum + Number.parseFloat(d[index]['montant']);
            } else {
                sum = sum - Number.parseFloat(d[index]['montant']);
            }
        }

        if (sum == 0 && d.length != 0) {
            init = parseInt(d[d.length - 1]['init']) + 1;
        } else if (sum != 0 && d.length != 0) {
            init = d[d.length - 1]['init'];
        }
        $('.init').val(init);
        if (new Date($('.date').val()).getFullYear() != new Date().getFullYear()) {
            var str = "'";
            str = [new Date().getFullYear(), '0'.concat(new Date().getMonth() + 1), ''.concat(new Date().getDate())].join('-');
            console.log(str);
            $('.date').val(str);
        }
        event.preventDefault();
        var data = undefined;
        let request =
            $.ajax({
                type: "GET",
                url: url,
                async: true,
                data: $(this).serialize(),
                success: function (output) {
                    console.log(output);
                    const dat = JSON.parse(output);
                    if (dat.status == "true") {
                        
                        var data = {
                            date: $('.date').val(),
                            journal: journal,
                            compte: $('.compte').val(),
                            tiers: $('.tiers').val(),
                            montant: dat.montant,
                            situation: $('.situation').val(),
                            ref: $('.ref').val()
                        }
                        dataContainer = d;
                        var message = successmessage(dat.message);
                        data['init'] = init;
                        dataContainer.push(data);
                        console.log(dataContainer);
                        verif(dataContainer);
                        if($('.compte').val().toString().charAt(0) == '6'){
                                $('.frame').css('display', 'block');
                                console.log(output.id_compte);
                                document.getElementsByClassName('frame')[0].setAttribute("id", dat.id_compte) ;
                        }

                        $('.table').append(createligne($('.date').val(), journal, $('.compte').val(), $('.tiers').val(), dat.montant, $('.situation').val(),dat.id,urlbase,$('.ref').val()));
                    } else {
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
            var message = errormessage(error);

            //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
        });
        request.always(function () {
            //Code à jouer après done OU fail quoi qu'il arrive
        });

    });
}
function sendcode(url) {
    $('#code').on("submit", function (event) {
        event.preventDefault();
        let request =
            $.ajax({
                type: "POST",
                url: url,
                async: true,
                data: $(this).serialize(),
                success: function (output) {
                    const dat = JSON.parse(output);
                    if (dat.status == "true") {
                        $('#code').hide();
                        location.reload();
                    } else {
                        var message = errormessage(dat.message);
                    }
                },
                beforeSend: function () {
                    //Code à appeler avant l'appel ajax en lui même
                }
            });
    });
}
function validate(url) {
    $('.btn2').on('click', function () {

        $.post(url, []).done(function (output) {
            $('tr').remove();
            var message = successmessage(output);
            
        })
            .fail(function (output) {
                var message = errormessage(output);
            })
            .always(function () {
            });
    });

}
function verif(datas) {
    dataContainer = datas;
    sum = 0;
    for (let index = 0; index < dataContainer.length; index++) {
        if (dataContainer[index]['situation'] == 1) {
            sum = sum + Number.parseFloat(dataContainer[index]['montant']);
        } else {
            sum = sum - Number.parseFloat(dataContainer[index]['montant']);
        }
    }
    if (sum == 0 && dataContainer.length != 0) {
        $(".btn2").show();
    } else {
        $(".btn2").hide();
        $('.auto1').empty();
    }
}
