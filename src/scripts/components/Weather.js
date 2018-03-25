export default class Weather {
  constructor() {
    this.unit = document.querySelector('.degree-unit button').innerHTML
  }

  rotateWindArrows() {
    const $windArrows = document.querySelectorAll('.wind-arrow')
    for (const $windArrow of $windArrows) {
      const orientation = $windArrow.dataset.orientation
      const speed = $windArrow.dataset.speed
      $windArrow.style.transform = `rotate(${orientation - 225}deg)`
      let hue = 0
      if (this.unit == '°F') hue = 130 - speed * 1.5
      else hue = 130 - speed * 3
      if (hue < 0) hue = 0
      $windArrow.style.color = `hsl(${hue},50%,50%)`
    }
  }
}