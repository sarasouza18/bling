<?php


namespace App\Http\Proxy;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class BlingProxy
{

    public function setInvoice($data){

        $client = new Client([
            'timeout' => 5,
        ]);

        $data['apikey'] = env('BLING_APIKEY');

        $url = env( 'BLING_URL') . '/Api/v2/notafiscal/json/';

        $response = $client->request('POST', $url, [
            'form_params' => $data
        ]);
        $result = $response->getBody()->getContents();
        return \GuzzleHttp\json_decode($result, true);
    }

    /**
     * @param string $number
     * @param string $serie
     * @return array|mixed
     */
    public function sendInvoiceForCustomer(string $number, string $serie, string $email): array
    {
        $client = new Client([
            'timeout' => 5,
        ]);
        $attributes = [
            'number' => $number,
            'serie' => $serie,
            'sendEmail' => $email
        ];
        $posts = $client->post('/Api/v2/notafiscal/', $attributes);
        return $posts;
    }

}
