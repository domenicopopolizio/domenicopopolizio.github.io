///////////////////////////////COSTANTI PER CACHE//////////////////////////////

const cacheName = '11STECCHINI';

const defaultToCache = [
    '/11stecchini/',
    'index.html',
    'background.png',
    'index.css',
    'index.html',
    'index.js',
    'logo.png',
    'manifest.json',
    'materialicon.woff2',
    'Roboto-Light.ttf',
    'stecchino.png',
    'velocity.min.js'
]

///////////////////////////////FUNZIONI///////////////////////////////

const sendToCache = async toCache => {
    caches.open(cacheName)
    .then (
        cache => cache.addAll(toCache)
    )
}

const serverFetch = request => fetch(request).then( response => response );

const cacheFetch = request => 
    caches.open(cacheName)
    .then(
        cache => 
            cache.match(request)
            .then(
                response => response || serverFetch(request)
            )
            .catch(
                error => serverFetch(request)
            )
    )


///////////////////////////////EVENTI/////////////////////////////////


self.addEventListener(
    'install',
    event => {
        let cacheWhitelist = [];
        event.waitUntil(
            sendToCache(defaultToCache)
        );
    }
);

self.addEventListener(
    'activate',
    event => {}
);

self.addEventListener(
    'message',
    event => {
        let message = event.data;
        console.log('Ricevuto messaggio recitante: "'+message+'";');
    }
    
);

self.addEventListener(
    'fetch',
    event => event.respondWith( cacheFetch(event.request) )
);


///////////////////////////////FINE///////////////////////////////////