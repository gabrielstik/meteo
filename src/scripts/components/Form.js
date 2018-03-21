export default class Form {

  constructor() {
    let place = ''
    const $input = document.querySelector('.input-place .place')
    $input.addEventListener('input', () => {
      place = $input.value
      place = place.replace(' ', '-')
    })
    $input.addEventListener('keydown', (event) => {
      if (event.keyCode == 13) window.location.replace(`/${place}`)
    })
  }
}