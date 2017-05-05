// GET POSITION //
isFirstTime = true;
if (isFirstTime == true) {
  isFirstTime = false;
  var form = document.getElementById('setLocation');
  var lat = document.querySelector('.setLat');
  var lon = document.querySelector('.setLon');

  navigator.geolocation.getCurrentPosition(function(location) {
    posX = location.coords.latitude;
    posY = location.coords.longitude;
    lat.value=posX;
    lon.value=posY;
    console.log(posX, posY);
    form.submit();
  });
}
