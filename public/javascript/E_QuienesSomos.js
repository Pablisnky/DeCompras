
document.getElementById("Asunto").addEventListener('keydown', function(){contarCaracteres('ContadorAsunto','Asunto', 200)}, false)

document.getElementById("Asunto").addEventListener('keydown', function(){valida_LongitudDes(200,'Asunto')}, false)

document.querySelector('#Asunto').addEventListener('keydown', function(){autosize('Asunto')}, false); 

document.addEventListener('DOMContentLoaded', function(){autofocus('Correo')}, false)

document.getElementById("Asunto").addEventListener('keydown', function(){blanquearInput('Asunto')}, false)