<?php

namespace Ridvanbaluyos\Noah;

/**
 * A PHP Library built for the Project NOAH API.
 * 
 * See: http://noah.up.edu.ph/apidocs/
 *
 * @package    Project NOAI API
 * @author     Ridvan Baluyos <ridvan@baluyos.net>
 * @link       https://github.com/ridvanbaluyos/noah
 * @license    MIT
 */
class Noah
{
	const API_URL = 'http://noah.up.edu.ph/api/';
	
	/** 
	 * Constructor
	 *
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * 
	 * Displays a dataset of 8. Each gives details about a doppler radar 
	 * that shows the cloud cover within its respective locations (indicated 
	 * by the verbose name) and surrounding areas in a specific time period. 
	 * The processed data is a representation of the estimated direction of 
	 * cloud formation and the amount of rain that they contain.
	 * 
	 * @return array $response
	 */
	public function getDoppler(): array
	{
		$url = 'doppler';
		$response = $this->getData($url);
		
		return $response;
	}
	
	/**
	 * 
	 * Displays the weather forecast for given locations for the next four days. 
	 * For each day, weather-indicating values are taken in 3-hour intervals.
	 *
	 * @param int $stationType - the station type
	 * @param int $stationId - the station ID
	 * 
	 * @return array $response
	 */
	public function getStationByTypeAndId($stationType = 0, $stationId = 0): array
	{
		$url = 'station/' . $stationType . '/' . $stationId;
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 *
	 * Displays data about all the stations which measure the weather.
	 * 
	 * @return array $response
	 */
	public function getStations(): array
	{
		$url = 'stations';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 *
	 * Flood maps show a contour map of flood extent and estimated water 
	 * level on an area based on recurrence interval, or the probability 
	 * of a flood event to occur.
	 * 
	 * @return array $response
	 */
	public function getFloodMaps(): array
	{
		$url = 'flood_maps';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 * Displays all flood reports for the given year
	 * 
	 * @param int $year - the year
	 * 
	 * @return array $response
	 */
	public function getFloodReport($year = 2000): array
	{
		$url = 'reports/flood/' . $year;
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 * 
	 * Documentation for WMS getmap request can be found here in the geoserver site 
	 * See (http://docs.geoserver.org/stable/en/user/services/wms/reference.html).
	 *
	 * @return array $response
	 */
	public function getLandslideMaps(): array
	{
		$url = 'landslide_maps';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 * 
	 * Documentation for WMS getmap request can be found here in the geoserver site 
	 * See (http://docs.geoserver.org/stable/en/user/services/wms/reference.html).
	 *
	 * @return array $response
	 */
	public function getStormSurgeMaps(): array
	{
		$url = 'storm_surge_maps';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 * 
	 * Displays the rain forecast for given locations for the next four hours, measured every 10 minutes.
	 *
	 * @return array $response
	 */ 
	public function getFourHourForecast(): array
	{
		$url = 'four_hour_forecast';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 *
	 * Displays the weather forecast for given locations for the next seven days. For each day, 
	 * weather-indicating values are taken in 3-hour intervals.
	 *
	 * @param int $locationId - the location ID (i don't know yet what this is).
	 * @return array $response
	 */  
	public function getSevenDayForecast($locationId = 1): array
	{
		$url = 'seven_day_forecast/'. $locationId;
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 *
	 * Displays a dataset of 4. Each gives information about a 
	 * contour map highlighting a weather-indicating measurement.
	 *
	 * @return array $response
	 */ 
	public function getLatestContour(): array
	{
		$url = 'latest_contour';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 *
	 * Displays a dataset of 6, (2 for HIMAWARI8 2 for GSMAP).
	 * HIMAWARI. Displays HIMAWARI8 imagery updated every 10 minutes. 
	 * In the presence of a tropical cyclone within the bounds of the 
	 * imagery, clouds are seen swirling around the eye of the typhoon. 
	 * The NOAH website shows the latest 12 animated HIMAWARI8 images 
	 * which provides a crude direction of the typhoon’s path.
	 *
	 * GSMAP. Displays GSMAP imagery updated every 30 minutes. GSMAP 
	 * shows the satellite-estimated precipitation. 
	 * This displays 5 datasets: the current GSMAP estimate, and the 
	 * GSMAP estimate for 1hr, 3hr, 6hr, and 12hrs.
     * 
	 * If these satellite images are to be used, please include the following 
	 * as usage disclosure, “Use of the Himawari/GSMAP images are limited to 
	 * non-profit purposes, such as research and education.”
	 *
	 * @return array $response
	 */ 
	public function getMtSat(): array
	{
		$url = 'mtsat';
		$response = $this->getData($url);
			
		return $response;
	}
	
	/**
	 * This function sends the CURL request to the NOAH API Server and
	 * decodes the json response to an array.
	 *
	 * @return array $response
	 */ 
	public function getData($url): array
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, self::API_URL . $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		$response = json_decode($response, true);

		return $response;
	}
}