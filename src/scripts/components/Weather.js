export default class Weather {
  rotateWindArrows() {
    const $windArrows = document.querySelectorAll('.wind-arrow')
    for (const $windArrow of $windArrows) {
      const orientation = $windArrow.dataset.orientation
      $windArrow.style.transform = `rotate(${orientation - 225}deg)`
    }
  }
}