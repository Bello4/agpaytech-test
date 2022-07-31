<?php

//declare(strict_types = 1);

namespace App;

use function PHPUnit\Framework\assertEquals;

//use PHPUnit\Framework\TestCase;

class ApiTest extends \PHPUnit\Framework\TestCase {

    public function checking_api_endpoint() {

         $countries = new App\CountryModel;
        $result = $countries->getCountries(20);

        $this.assertEquals(20, $result);
        // $this->assertJsonStringEqualsJsonString(
        //     '{"message": "ok"}', 
        //     json_encode([$result]), 
        //     'Check message ok json'
        // );
    }
    

}