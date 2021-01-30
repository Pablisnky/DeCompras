console.log("Entra al serviceWorker mediante sw.js")

//asignar un nombre a la cache que se desea crear
const CACHE_NAME = 'v1_cache_pedidoRemoo',
  urlsToCache = [
    './',
    './estilosPidoRadipo.css',
    './convoca_SW.js',
    //'./img/ProgramadorFitness.png',
    './images/logo.png'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos que se desean y se definieron anteriormente; 
self.addEventListener('install', function(event){//self es palabra reservada que llama a SW en javascript
  event.waitUntil( //El método event.waitUntil() toma una promesa y la usa para saber cuánto tarda la instalación y si se realizó correctamente.
    caches.open(CACHE_NAME)
      .then(function(cache){
        console.log('Opened cache');
        return cache.addAll(urlsToCache)
      })
      .catch(err => console.log('Falló registro de cache', err))
  );
});


//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//Cuando se desee mostrar una respuesta almacenada en caché s eu tiliza fetch
// self.addEventListener('fetch', e => {
//   //Responder ya sea con el objeto en caché o continuar y buscar la url real
//   e.respondWith(
//     caches.match(e.request)
//       .then(res => {
//         if (res) {
//           //recuperar del cache
//           return res
//         }
//         //recuperar de la petición a la url
//         return fetch(e.request)
//       })
//   )
// })


// -------------------------------------------------------------------------------------------
                                  // NOTIFICACIONES PUSH
// -------------------------------------------------------------------------------------------
// Trabajando con notifcaciones

// var req = navigator.push.register();

// req.onsuccess = function(e) {
//   var endpoint = req.result;
//   debug("New endpoint: " + endpoint );
// }

// req.onerror = function(e) {
//   debug("Error getting a new endpoint: " + JSON.stringify(e));
// }




// if(navigator.push.register()){
//   // console.log(navigator.push.register())
//   // Solicitar el endpoint. Esto usa PushManager.register().
//   var req = navigator.push.register();
  
//   req.onsuccess = function(e) {
//     var endpoint = req.result;
//       console.log("New endpoint: " + endpoint );
//       // En este punto, usted deberá usar algunos llamados para enviar el 
//       // endpoint a su servidor. Por ejemplo:
//       /* 
//       var post = XMLHTTPRequest();
//       post.open("POST", "https://your.server.here/registerEndpoint");
//       post.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//       post.send("endpoint=" + encodeURIComponents( endpoint ) );
//       */
//       // Obviamente usted querrá añadir controladores .onload y .onerror,
//       // añadir información de id del usuario, y cualquier otra cosa que podría
//       // necesitar para asocial el endpoint con el usuario.
//     }

//    req.onerror = function(e) {
//      console.error("Error getting a new endpoint: " + JSON.stringify(e));
//    }
// } 
// else{
//   console.log("push no se encuentra disponible en el DOM, así que haga algo diferente")
// }
