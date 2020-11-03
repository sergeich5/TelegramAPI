<?php


namespace Sergeich5\Telegram\Bots;



class Request
{
    static function request(string $token, string $endpoint, array $params = []) : array
    {
        $url = 'https://api.telegram.org/bot' . $token . '/' . $endpoint;
        if (count($params) > 0)
            $url .= '?' . http_build_query($params);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($data, true);

        return ($data) ? $data : [];
    }
}