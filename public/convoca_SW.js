//comprobar que el navegador desde donde se ejecuta nuestra aplicación tiene disponible la API de Service Worker o soporta SW

//Una vez que vemos que efectivamente tenemos disponible la API, podemos registrar el SW hospedado en nuestro servidor

//Registrar e instalar el SW nos llevará un tiempo de cómputo que asume el hilo principal. Por tanto, puede que reduzcamos el rendimiento de nuestra aplicación. Como un SW es una funcionalidad por lo general añadida, pero que no es crítica, vamos a esperar a registrarlo una vez que todos los recursos críticos hayan sido cargados.
console.log("Entra al archivo \"concova_SW.js\"")

//Se verifica si la API del service worker está disponible en el navegador.
if('serviceWorker' in navigator){
  window.addEventListener('load', function(){
    //Se registra el serviceWorker en el dispositivo del usuario
    navigator.serviceWorker.register('./sw.js')
    //Devuelve una promesa,
    .then(function(registration){
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }) 
    .catch(function(err){
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}
else{
  console.log("El navegador no soporta serviceWorker");
}


//comprobar que el navegador desde donde se ejecuta nuestra aplicación tiene disponible la API de notificaciones push
if('PushManager' in window){
  console.log('Push is supported');
}
 else{
  console.log('Push messaging is not supported');
  pushButton.textContent = 'Push Not Supported';
}