export default class Connection {
  constructor() {
    const $button = document.querySelector('button.user')
    const $form = document.querySelector('.connexion-container ')
    const $quit = document.querySelector('form .quit')

    $button.addEventListener('mousedown', () => {
      $form.classList.add('active')
    })
    $quit.addEventListener('mousedown', () => {
      $form.classList.remove('active')
    })
    window.addEventListener('keydown', (event) => {
      if (event.keyCode == 27) $form.classList.remove('active')
    })
  }
}