export default class Weather {
  rotateWindArrows() {
    const $windArrows = document.querySelectorAll('.wind-arrow')
    for (const $windArrow of $windArrows) {
      const orientation = $windArrow.dataset.orientation
      const speed = $windArrow.dataset.speed
      $windArrow.style.transform = `rotate(${orientation - 225}deg)`
      const hue = 130 - speed * 2
      if (hue < 0) hue = 0
      $windArrow.style.color = `hsl(${hue},50%,50%)`
    }
  }
}