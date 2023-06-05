var infos = [];
function display()
{
    if (document.getElementsByClassName("frame__corporable")[0].style.display == 'none' || document.getElementsByClassName("frame__corporable")[0].style.display == 'undefined'){
        document.getElementsByClassName("frame__corporable")[0].style.display = 'block';
        document.getElementsByClassName("frame__notification")[0].style.display = 'block';
    }else{
        document.getElementsByClassName("frame__corporable")[0].style.display = 'none';
        document.getElementsByClassName("frame__validity")[0].style.display = 'none';
        document.getElementsByClassName("frame__notification")[0].style.display = 'none';
        
    }
}
function display_close()
{
    document.getElementsByClassName("frame__close")[0].style.display = 'none';
}
function verif_sum(i){
    compte = document.getElementsByClassName("frame")[0].getAttribute("id");
    function Elements(compte,prod_name,prod,centre_name ,cent,id_nature,nature,pu,qte)   {
        this.compte = compte;
       this.produit = prod;
       this.produit_id = prod_name;
       this.centre_id = centre_name;
        this.center  = cent;
        this.nature = nature;
        this.id_nature = id_nature;
        this.pu = pu;
        this.qte = qte;
        
    };

    sum_products = 0;
    var status = true;
        for(var id = 0 ; id <i ; id++){
            sum = 0;
            sum_product = Number( document.getElementsByClassName("product"+id)[0].value); 
            var produit = document.getElementsByClassName("product"+id)[0].id;
            for (let index = 0; index < document.getElementsByClassName("center"+id).length; index++) {
                sum +=Number( document.getElementsByClassName("center"+id)[index].value); 
                var center = document.getElementsByClassName("center"+id)[index].id;
                sum_nature = 0;
                for (let ind = 0; ind < document.getElementsByClassName("frame__nature__input"+id+index).length; ind++) {
                    sum_nature += Number(document.getElementsByClassName("frame__nature__input"+id+index)[ind].value);
                    if(Number( document.getElementsByClassName("product"+id)[0].value)>0 && Number( document.getElementsByClassName("center"+id)[index].value) > 0 && Number(document.getElementsByClassName("frame__nature__input"+id+index)[ind].value)>0){
                        infos.push(new Elements(compte,Number(produit),Number( document.getElementsByClassName("product"+id)[0].value),Number(center),Number( document.getElementsByClassName("center"+id)[index].value),
                        document.getElementsByClassName("frame__nature__input"+id+index)[ind].id, Number(document.getElementsByClassName("frame__nature__input"+id+index)[ind].value),Number(document.getElementsByClassName("frame__quantite__pu")[0].value),Number(document.getElementsByClassName("frame__quantite__qte")[0].value)));
                    }

                }

                if(sum_nature!=100 && Number( document.getElementsByClassName("center"+id)[index].value) !=0){
                    status = false;
                    break;
                }
            }
            sum_products += sum_product;
            if(sum != 100 && sum_product != 0){
                status = false;
                break;
            }
        }
    if (sum_products==100 && status==true ){
        create_success_div("somme conforme");
        if (document.getElementsByClassName("frame__validity")[0].style.display == "none"){
            document.getElementsByClassName("frame__validity")[0].style.display = "block";
        }
    }else{
        create_error_div("somme non-conforme");
        if (document.getElementsByClassName("frame__validity")[0].style.display != "none"){
            document.getElementsByClassName("frame__validity")[0].style.display = "none";
        }
    }
    console.log(infos);
}
function create_error_div(message){
    var error = document.createElement("div");
    error.innerHTML = "<p>"+message+"<p>";
    var notif = document.getElementsByClassName("frame__notification")[0];
    notif.style.backgroundColor = "red";
    notif.replaceChild(error, notif.firstChild);
    
}
function create_success_div(message){
    var error = document.createElement("div");
    error.innerHTML = "<p>"+message+"<p>";
    var notif = document.getElementsByClassName("frame__notification")[0];
    notif.style.backgroundColor = "green";
    notif.replaceChild(error, notif.firstChild);
    
}
function close_window(){
    var choice  = document.getElementsByClassName("frame__incorporable__checkbox")[0];
    if(choice.checked){
        var frame = document.getElementsByClassName("frame")[0];
        frame.style.display = "none";
    }
}
function validation(url){
    console.log(infos);
        let request =
            $.ajax({
                type: "POST",
                url: url,
                async: true,
                data:{'info':JSON.stringify(infos)},
                success: function (output) {
                    const dat = JSON.parse(output);
                    if (dat.status == "true") {
                        $('.frame').css('display', 'none');
                         infos = [];
                    } else {
                        var message = errormessage(dat.message);
                    }
                },
                beforeSend: function () {
                    //Code à appeler avant l'appel ajax en lui même
                }
            });
}