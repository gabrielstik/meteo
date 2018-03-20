export default class Geolocation {
  getPos() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) =>  {
        return {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        }
      },
      () => { return false },
      { timeout: 10000 })
    }
  }
}