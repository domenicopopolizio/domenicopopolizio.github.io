///////////////////////////////VARIABILI//////////////////////////////

var cacheName = "11STECCHINI";

var defaultToCache = [
    "/11stecchini",
    "background.png",
    "index.css",
    "index.html",
    "index.js",
    "logo.png",
    "manifest.json",
    "materialicon.woff2",
    "Roboto-Light.ttf",
    "stecchino.png",
    "velocity.min.js"
    
]

///////////////////////////////FUNZIONI///////////////////////////////

async function sendToCache(toCache) {
    caches.open(cacheName)
        .then(
        function (cache) {
            console.log("cache: ", toCache);
            return cache.addAll(toCache);
        }
        )
        .then(
        function () {
            self.skipWaiting()
        }
        );
}

function serverFetch(request, save = true) {
    return fetch(request)
        .then(
        function (response) {
            if (!response.ok) {
                return caches.open(cacheName)
                    .then(
                    function (cache) {
                        return (request.url.slice(-5) == "/data" ? cache.match("/error/data") : cache.match('/error'));
                    }
                    )
            }
            return response;
        }
        )
        .catch(
        function (err) {
            return caches.open(cacheName)
                .then(
                function (cache) {
                    return cache.match(request).then(function (response) { return response || (request.url.slice(-5) == "/data" ? cache.match("/offline/data") : cache.match('/offline')) });
                }
                )
        }
        )
}

function cacheFetch(request) {
    return caches.open(cacheName)
        .then(
        function (cache) {
            return cache.match(request)
                .then(
                function (response) {
                    return response || serverFetch(request);
                }
                )
        }
        )
}


///////////////////////////////EVENTI/////////////////////////////////


self.addEventListener(
    'install',
    function(event) {
        var cacheWhitelist = [];
        event.waitUntil(
            sendToCache(defaultToCache)
        );
    }
);

self.addEventListener(
    'activate',
    function (event) {
    }
);

self.addEventListener(
    'message',
    function (event) {
        var message = event.data;
        switch (message.title) {
            case "cache":
                sendToCache(message.message);
                break;
            default:
                console.log("Ricevuto un messaggio sconosciuto: ", event);
                break;
        }
    }
);

self.addEventListener(
    'fetch',
    function (event) {
        return event.respondWith(
            cacheFetch(event.request)
        )
    }
);


///////////////////////////////FINE///////////////////////////////////






















//MIGLIORE (?!)

/*
self.addEventListener(
    'fetch',
    event => {
        console.log(event.request);

        event.respondWith(
            fetch(event.request)
                .then(
                    response => {
                        caches.put(event.request, response);
                        return response;
                    }
                )
                .catch( error => caches.match(event.request).then(res => res || caches.match('/offline')) )                           
        )
    }
)
*/

/*NEL CASO DI RISORSE CHE NON CAMBIANO, COME IL LOGO si usa il seguente sistema, si memorizzano nella cache, e si usa la versione 
memorizzata, se per caso non c'è ( magari viene pulita la cache ) si cerca nel server */
/*self.addEventListener(
    'fetch',
    event => {                              //evento
        event.respondWith(                  //rispondendo cioò che viene elaborato seguentemente:
            caches.match(event.request)     //cerca delle corrispondenze nella cache
                .then(response => (response || fetch(event.request))) //quando ha finito, restituisce le corrispondenze o le cerca nel server
                                                                                                                        //se mancano
        )
    }
)*/


/*NEL CASO DI FILE FREQUENTEMENTE AGGIORNATI (COME DEI JSON DI DATI)  si usa questo sistema che 
cerca i dati sul server (perchè devono essere aggiornati) e poi, se non ci sono si usa la potenziale versione memorizzata */

/*

self.addEventListener(
    'fetch',
    event => {
        fetch(event.request).catch(
            () => caches.match(event.request)
        )
    }
);
*/



//CREO IO PER DATI FREQUENTI MA GENERICO,
/*cerco sul server, se c'è un errore cerca nella cache, altrimenti offline*/
//NON SONO SICURO FUNZIONA!!!!!! da un'errore

/*self.addEventListener(
    'fetch',
    event => {
        event.respondWith(
            fetch(event.request)
                .catch(
                    () => {
                        caches.match(event.request)
                            .then(response => response)
                            .catch(() => caches.match('/offline'))
                    }
                )
        )
    }
)*/
