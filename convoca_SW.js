//comprobar que el navegador desde donde se ejecuta nuestra aplicación tiene disponible la API de Service Worker o soporta SW

//Una vez que vemos que efectivamente tenemos disponible la API, podemos registrar el SW hospedado en nuestro servidor

// 	Registrar e instalar el SW nos llevará un tiempo de cómputo que asume el hilo principal. Por tanto, puede que reduzcamos el rendimiento de nuestra aplicación. Como un SW es una funcionalidad por lo general añadida, pero que no es crítica, vamos a esperar a registrarlo una vez que todos los recursos críticos hayan sido cargados.

if('serviceWorker' in navigator){ 	
	window.addEventListener('load', function (){
        navigator.serviceWorker.register('./sw.js')
          .then(reg => console.log('Registro de Service Worker exitoso',reg))
          .catch(err => console.warn('Error al registrar el Service Worker',err)) 
    })
}

//comprobar que el navegador desde donde se ejecuta nuestra aplicación tiene disponible la API de notificaciones push
if ('PushManager' in window) {
  console.log('Push is supported');
}
 else{
  console.warn('Push messaging is not supported');
  pushButton.textContent = 'Push Not Supported';
}