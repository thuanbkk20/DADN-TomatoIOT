<?php
class AdaFruitIOFeed{
	public $key;
	public $url;
	public $name;
    public $feedKey;
	
	public function __construct($key, $name, $url, $feedKey){
		$this->key = $key;
		$this->name = $name;
		$this->url = $url;
        $this->feedKey = $feedKey;
	}
	
	/**
	 * Pushes a new value to the feed in a json form
	 * 
	 * @param mixed $value
	 * @param string $quoted : indicates if the json data must be wrapped in quotes
	 */
	public function send($value, $quoted = false){
		$req = '{"value":';
		
		if($quoted) $req .= '"';
		
		$req .= $value;
		
		if($quoted) $req .= '"';
		
		$req .= '}';
		
		
		$url = $this->url."/api/feeds/".$this->name."/data/send";
		$res = $this->sendRequest($url, true, $req);
		
		return $res;
	}
	
	/**
	 * Retrieves the last value of this feed
	 * @return mixed
	 */
	public function getLastData(){
		$url = $this->url."/api/feeds/".$this->name."/data/last.txt";
		$data = json_decode($this->sendRequest($url), true);
        return $data;
	}

    public function getLastUpdate(){
        $url = $this->url."/api/v2/jakunai/feeds/".$this->feedKey."/data/last";
        $data = $this->sendRequest($url);
        $data = json_decode($data, true);
        return $data['updated_at'];
    }

    public function getFeedInfo(){
        $url = $this->url."/api/v2/jakunai/feeds/".$this->feedKey."/data/last";

        return $this->sendRequest($url);
    }
	
	/**
	 * Sends an HTTP request 
	 * @param string $body
	 */
	protected function sendRequest($url, $isPOST = false, $body = "")
	{
				
		$c = curl_init($url);
		
		$headers = array();
		$headers[] = "X-AIO-Key: ".$this->key;
		
		
		if($isPOST)
		{
			curl_setopt($c, CURLOPT_POST, true);
			$headers[] = "Content-Type: application/json";
			curl_setopt($c, CURLOPT_POSTFIELDS, $body);
		}
		
		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
				
		$res = curl_exec($c);
				
		curl_close($c);
		
		return $res;
	}
}
?>