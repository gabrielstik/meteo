import './vendor/modernizr.js'

import Weather from './components/Weather'
import Geolocation from './components/Geolocation'
import Form from './components/Form'

const weather = new Weather()
const geolocation = new Geolocation()
const form = new Form()

weather.rotateWindArrows()