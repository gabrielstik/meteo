export default class Connection {
  constructor() {
    this.$form = document.querySelector('.connexion-container')
    const $button = document.querySelector('.js-show-form')
    const $quit = document.querySelector('form .quit')

    $button.addEventListener('mousedown', () => {
      this.activate()
    })
    $quit.addEventListener('mousedown', () => {
      this.desactivate()
    })
    window.addEventListener('keydown', (event) => {
      if (event.keyCode == 27) this.desactivate()
    })
  }

  activate() {
    this.$form.classList.add('active')
  }

  desactivate() {
    this.$form.classList.remove('active')
  }
}