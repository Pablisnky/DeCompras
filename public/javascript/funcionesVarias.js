let Pulsar = false
function ocultarDiv(id){
    if(Pulsar == false){
        Pulsar = true;
        console.log(Pulsar);
        document.getElementById(id).style.display = "block";
    }
    else{
        Pulsar = false;
        console.log(Pulsar);
        document.getElementById(id).style.display = "none";
    }
}