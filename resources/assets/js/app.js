/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
  el: '#app'
});


var mapContainer = document.getElementById('map');

if (mapContainer) {
  var map = new google.maps.Map(mapContainer, {
    center: new google.maps.LatLng(35.4896589, 118.321531),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 6
  });

  var t = new Date().getTime();
  var waqiMapOverlay = new google.maps.ImageMapType({
    getTileUrl: function (coord, zoom) {
      return 'https://tiles.waqi.info/tiles/usepa-aqi/' + zoom + "/" + coord.x + "/" + coord.y + ".png?token={{ env('AQICN_TOKEN') }}";
    },
    name: "Air Quality"
  });

  map.overlayMapTypes.insertAt(0, waqiMapOverlay);
}