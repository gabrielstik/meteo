<?
class Weather {
  function __construct($place) {
    $geocoder_url = 'https://maps.googleapis.com/maps/api/geocode/json?key='.GOOGLE_API_KEY.'&language=fr&address='.str_replace(' ', '+', $place);
    $this->geocoder_data = $this->get_data($geocoder_url);
    $this->place_data = isset($_GET['q']) ? $this->geocode($_GET['q']) : $this->geocode('Paris');

    $unit = isset($_SESSION['unit']) ? $_SESSION['unit'] : 'metric';

    $weather_url = 'http://api.openweathermap.org/data/2.5/weather?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;
    $forecast_url = 'http://api.openweathermap.org/data/2.5/forecast?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;

    $this->weather_data = $this->get_data($weather_url);
    $this->forecast_data = $this->get_data($forecast_url);
  }

  function geocode($place) {
    $this->place_data = new stdClass();
    if (!empty($this->geocoder_data->results[0])) {
      foreach ($this->geocoder_data->results[0]->address_components as $adress_component) {
        switch ($adress_component->types[0]) {
          case 'locality':
          $this->place_data->city = $adress_component->long_name;
          break;
          case 'administrative_area_level_1':
          $this->place_data->region = $adress_component->long_name;
          break;
          case 'country':
          $this->place_data->country = $adress_component->long_name;
          break;
          default:
        }
      }
      if (empty($this->place_data->city)) $this->place_data->city = $place;
      if (empty($this->place_data->region)) $this->place_data->region = '';
      if (empty($this->place_data->country)) $this->place_data->country = '';
      $this->place_data->lat = $this->geocoder_data->results[0]->geometry->location->lat;
      $this->place_data->lng = $this->geocoder_data->results[0]->geometry->location->lng;
      return $this->place_data;
    }
  }
  
  function get_data($url) {
    $path = './cache/'.md5($url);
    if (!is_dir('./cache')) mkdir('./cache');
    if (file_exists($path) && time() - filemtime($path) < 60) {
      $data = json_decode(file_get_contents($path));
    }
    else {
      $data = json_decode(file_get_contents($url));
      file_put_contents('./cache/'.md5($url), json_encode($data));
    }
    return $data;
  }

  function deg_to_str($deg) {
    if ($deg < 360 / 32 * 1 || $deg >= 360 / 32 * 31) return 'N'; 
    else if ($deg < 360 / 32 * 3) return 'NNE'; 
    else if ($deg < 360 / 32 * 5) return 'NE'; 
    else if ($deg < 360 / 32 * 7) return 'ENE'; 
    else if ($deg < 360 / 32 * 9) return 'E'; 
    else if ($deg < 360 / 32 * 11) return 'ESE'; 
    else if ($deg < 360 / 32 * 13) return 'SE'; 
    else if ($deg < 360 / 32 * 15) return 'SSE'; 
    else if ($deg < 360 / 32 * 17) return 'S'; 
    else if ($deg < 360 / 32 * 19) return 'SSO'; 
    else if ($deg < 360 / 32 * 21) return 'SO'; 
    else if ($deg < 360 / 32 * 23) return 'OSO'; 
    else if ($deg < 360 / 32 * 25) return 'O';
    else if ($deg < 360 / 32 * 27) return 'ONO';
    else if ($deg < 360 / 32 * 29) return 'NO';
    else if ($deg < 360 / 32 * 31) return 'NNO';
  }
}