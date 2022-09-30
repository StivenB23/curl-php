<?php 
namespace App\classes;

class Products {
    public function __construct(private $url=null) {
        $this->url = 'https://fakestoreapi.com/products/';
    }
    public function getAllProducts()
    {
        $session = curl_init();
        curl_setopt($session, CURLOPT_URL,$this->url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($session);
        if (curl_errno($session)) echo curl_error($session);
        else $decoded = json_decode($response, true);
        return $decoded;
    }
}

?>