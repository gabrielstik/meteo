<?
class Weather {
  public function __construct() {
    define('OPEN_WEATHER_API_KEY', '08da33fe0bd44b99b35ef3eabc42fddd');
    define('GOOGLE_API_KEY', 'AIzaSyA412LU3h-USYKW_U-_al9fOEeZpsjTiic');

    $this->place_data = isset($_GET['place']) ? $this->geocode($_GET['place']) : $this->geocode('Paris');
    $unit = 'metric';
    $weather_url = 'http://api.openweathermap.org/data/2.5/weather?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;
    $forecast_url = 'http://api.openweathermap.org/data/2.5/forecast?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;

    $this->weather_data = $this->get_data($weather_url);
    $this->forecast_data = $this->get_data($forecast_url);
  }

  private function geocode($place) {
    $geocoder_data = json_decode(file_get_contents(
      'https://maps.googleapis.com/maps/api/geocode/json?key='.GOOGLE_API_KEY.'&language=fr&address='.str_replace(' ', '-', $place)
    ));
    $this->place_data = new stdClass();
    $this->place_data->city = $geocoder_data->results[0]->address_components[0]->long_name;
    $this->place_data->region = $geocoder_data->results[0]->address_components[2]->long_name;
    $this->place_data->country = $geocoder_data->results[0]->address_components[3]->long_name;
    $this->place_data->lat = $geocoder_data->results[0]->geometry->location->lat;
    $this->place_data->lng = $geocoder_data->results[0]->geometry->location->lng;
    return $this->place_data;
  }
  
  private function get_data($url) {
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

  public function deg_to_str($deg) {
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