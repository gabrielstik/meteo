export default class Geolocation {
  constructor() {
    this.$button = document.querySelector('.locate')
    this.$button.addEventListener('mousedown', () => {
      this.getPos()
    })
  }
  getPos() {
    this.$button.classList.add('locating')
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) =>  {
        const pos = {
          lat: position.coords.latitude,
          long: position.coords.longitude
        }
        window.location.replace(`/${pos.lat},${pos.long}`)
      },
      () => {
        this.$button.classList.remove('locating')
        this.$button.classList.add('fail')
        setTimeout(() => { this.$button.classList.remove('fail') }, 1000)
      },
      { timeout: 5000 })
    }
  }
}