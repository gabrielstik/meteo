import './vendor/modernizr.js'

import Weather from './components/Weather'
import Geolocation from './components/Geolocation'
import Form from './components/Form'
import Connection from './components/Connection'

const weather = new Weather()
new Geolocation()
new Form()
if (document.querySelector('.js-show-form')) {
  new Connection()
}

weather.rotateWindArrows()