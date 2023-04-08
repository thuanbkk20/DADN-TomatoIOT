<?php
class AdaFruitIO {
	public $key;
	public $url;
	
	public function __construct($key='aio_kJce1278gviLyoWoub6u5W1hvvOt', $url="http://io.adafruit.com"){
		$this->key = $key;
		$this->url = $url;
	}
	
	/**
	 * Returns a feed wrapper
	 * @param string $name
	 * @return AdaFruitIOFeed
	 */
	public function getFeed($name, $feedKey){
		return new AdaFruitIOFeed($this->key, $name, $this->url, $feedKey);
	}
	
	/**
	 * Returns the all the feed names in an array
	 * @return array of string
	 */
	public function getFeedNames(){
		$url = $this->url."/api/feeds.json";
		
		$c = curl_init($url);
		
		$headers = array();
		$headers[] = "X-AIO-Key: ".$this->key;
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
		
		$json = json_decode(curl_exec($c));

		curl_close($c);
		
		$arr = array();
		foreach($json as $j)
			$arr[] = $j->name;
		
		return $arr;
		
	}
}
?>