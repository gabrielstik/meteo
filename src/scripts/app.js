import Weather from './components/Weather'
import Geolocate from './components/Geolocate'
import Form from './components/Form'
import Connection from './components/Connection'

const weather = new Weather()
new Geolocate()
new Form()
if (document.querySelector('.js-show-form')) {
  new Connection()
}

weather.rotateWindArrows()