function display()
{
    console.log(document.getElementsByClassName("frame__corporable")[0].style.display );
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
    function Elements(prod_name,prod,centre_name ,cent,id_nature,nature)   {
       this.produit = prod;
       this.produit_id = prod_name;
       this.centre_id = centre_name;
        this.center  = cent;
        this.nature = nature;
        this.id_nature = id_nature;
    };
    var infos = [];
    sum_products = 0;
    var status = true;
        for(var id = 0 ; id <i ; id++){
            sum = 0;
            sum_product = Number( document.getElementsByClassName("product"+id)[0].value); 
            for (let index = 0; index < document.getElementsByClassName("center"+id).length; index++) {
                sum +=Number( document.getElementsByClassName("center"+id)[index].value); 
                sum_nature = 0;
                for (let ind = 0; ind < document.getElementsByClassName("frame__nature__input"+id+index).length; ind++) {
                    sum_nature += Number(document.getElementsByClassName("frame__nature__input"+id+index)[ind].value);
                    infos.push(new Elements("product"+id,Number( document.getElementsByClassName("product"+id)[0].value),"center"+id,Number( document.getElementsByClassName("center"+id)[index].value),
                    "frame__nature__input"+id+index, Number(document.getElementsByClassName("frame__nature__input"+id+index)[ind].value)));
                }

                if(sum_nature!=100 && Number( document.getElementsByClassName("center"+id)[index].value) !=0){
                    console.log("frame__nature__input"+id+index);
                    console.log(sum_nature);
                    status = false;
                    break;
                }
            }
            sum_products += sum_product;
            if(sum != 100 && sum_product != 0){
                console.log("ato");
                status = false;
                break;
            }
        }
console.log(sum_products);
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
