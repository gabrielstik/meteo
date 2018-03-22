import './vendor/modernizr.js'

import Weather from './components/Weather'
import Geolocation from './components/Geolocation'
import Form from './components/Form'
import Connection from './components/Connection'

const weather = new Weather()
const geolocate = new Geolocation()
const form = new Form()
if (document.querySelector('.js-show-form')) {
  const connection = new Connection()
  console.log('?')
}

weather.rotateWindArrows()