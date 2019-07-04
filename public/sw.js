// self.addEventListener('install', function(event) {
//   // Perform install steps
// });

var CACHE_NAME = 'esala-v1';
var urlsToCache = [
  '/',
  '/welcome/',
  '/app/',
  '/logados/',
  'app.css/',
  'app.js/',
  'lista/professores/',
  'styles/main.css/',
  'script/main.js/'
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});