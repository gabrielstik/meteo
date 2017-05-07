// GET POSITION //
var form = document.getElementById('setLocation');
var lat = document.querySelector('.setLat');
var lon = document.querySelector('.setLon');

watchID = navigator.geolocation.watchPosition(function(location) {
  posX = location.coords.latitude;
  posY = location.coords.longitude;
  lat.value=posX;
  lon.value=posY;
  form.submit();
});

setTimeout(stop,5000);

function stop() {
  navigator.geolocation.clearWatch(watchID);
}
