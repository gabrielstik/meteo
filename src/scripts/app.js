/* global geolocation */

import './vendor/modernizr.js'

import Weather from './components/Weather'
import Geolocation from './components/Geolocation'

const weather = new Weather()
const geolocation = new Geolocation()

weather.rotateWindArrows()