export default class Geolocation {
  constructor() {
    const $button = document.querySelector('.locate')
    $button.addEventListener('mousedown', () => {
      this.getPos()
    })
  }
  getPos() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) =>  {
        const pos = {
          lat: position.coords.latitude,
          long: position.coords.longitude
        }
        window.location.replace(`/${pos.lat},+${pos.long}`)
      },
      () => { return false },
      { timeout: 10000 })
    }
  }
}