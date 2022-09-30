<?php 
namespace App\ClassProyect;

class Curl 
{
    private $handler;
    public function __construct(private $url, private $option = null){
        $this->option = is_null($option) ? CURLOPT_URL : $option;
    }

    public function init()
    {
       $this->handler = curl_init();
       return $this;
    }
    
    public function setOption($option=null, $value=null)
    {
     curl_setopt($this->handler, is_null($option) ? $this->option : $option, is_null($value)? $this->url : $value);   
     return $this;
    }

    public function buildQuery(array $array)
    {
        curl_setopt($this->handler, CURLOPT_POSTFIELDS, http_build_query($array));
        return $this;
    }

    public function execute()
    {
        return curl_exec($this->handler);
    }

    public function close()
    {
        curl_close($this->handler);
        return $this;
    }
}

?>