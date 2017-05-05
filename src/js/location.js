// GET POSITION //
var form = document.getElementById('setLocation');
var lat = document.querySelector('.setLat');
var lon = document.querySelector('.setLon');

var supports = {
  geolocation: !!navigator.geolocation
};

navigator.geolocation.getCurrentPosition(function(location) {
  posX = location.coords.latitude;
  posY = location.coords.longitude;
  lat.value=posX;
  lon.value=posY;
  form.submit();
});
