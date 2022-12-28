<?php

namespace Assignment\Weather\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use DateTime;
use DateTimeZone;
class Save extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $location = $this->getRequest()->getParam('location');
        $apikey = "d4a3d91463fe5af675a2b232d33807d3";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.openweathermap.org/geo/1.0/direct?q=$location&limit=1&appid=$apikey",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseData = json_decode($response, true);

        $latitude = $responseData[0]["lat"];
        $longitude = $responseData[0]["lon"];


        // Add cURL code here
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apikey&units=metric",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseData = json_decode($response, true);

        date_default_timezone_set('Asia/Tbilisi');


        // Sunrise And Sunset
        $sunrise = $responseData['sys']['sunrise'];
        $sunset = $responseData['sys']['sunset'];

        // Submitted data time
        $checked_on = date('Y-m-d H:i:s');

        // Sunrise In UTC
        $sunriseDateTime = new DateTime();
        $sunriseDateTime->setTimestamp($sunrise);
        $sunriseDateTime->setTimezone(new DateTimeZone('UTC'));
        $sunriseDateTimeString = $sunriseDateTime->format('Y-m-d H:i:s');

        // Sunset In UTC
        $sunsetDateTime = new DateTime();
        $sunsetDateTime->setTimestamp($sunset);
        $sunsetDateTime->setTimezone(new DateTimeZone('UTC'));
        $sunsetDateTimeString = $sunsetDateTime->format('Y-m-d H:i:s');

        $weatherModel = $this->_objectManager->create(\Assignment\Weather\Model\Weather::class);
        $weatherModel->setData([
            'city' => $location,
            'country' => $responseData['sys']['country'],
            'description' => $responseData['weather'][0]['description'],
            'temperature' => $responseData['main']['temp'],
            'feels_like' => $responseData['main']['feels_like'],
            'pressure' => $responseData['main']['pressure'],
            'humidity' => $responseData['main']['humidity'],
            'wind_speed' => $responseData['wind']['speed'],
            'sunrise' => $sunriseDateTimeString,
            'sunset' => $sunsetDateTimeString,
            'checked_on' => $checked_on
        ]);

        $weatherModel->save();


        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
