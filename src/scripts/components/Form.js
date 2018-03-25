export default class Form {
  constructor() {
    const $input = document.querySelector('.input-place .place')
    $input.addEventListener('keydown', (event) => {
      if (event.keyCode == 13) window.location.replace(`/${ $input.value.replace(' ', '-') }`)
    })
  }
}