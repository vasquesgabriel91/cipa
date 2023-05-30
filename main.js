var btn = document.querySelector("#btn");
var btn1 = document.querySelector("#btn1");
var re = document.querySelector("#re");
var nome = document.querySelector("#nome");

btn.addEventListener('click', ()=>{
    re.value= '';
    nome.value= '';
});
btn1.addEventListener('click', ()=>{
    re.value= '';
    nome.value= '';
});



var consulta = document.querySelector("#consulta").disabled = true;
var acesso =document.querySelector("#btn_acesso").disabled =true

document.querySelector("#matricula").addEventListener("input", function(event){

    // var re = document.querySelector("#re").value;
    // var nome = document.querySelector("#nome").value;

    var matricula = document.querySelector("#matricula").value;

    if (matricula !== null && matricula !== '' ){ 
    // if (matricula !== null && matricula !== '' ||  re !== null && re !== '' && nome !== null && nome !== '') {
        document.querySelector("#consulta").disabled = false;
        // document.querySelector("#btn_acesso").disabled = false;

      } else {
        document.querySelector("#consulta").disabled = true;
        // document.querySelector("#btn_acesso").disabled = true;

      }

});
