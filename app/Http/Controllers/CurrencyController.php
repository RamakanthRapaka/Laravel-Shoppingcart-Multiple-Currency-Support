<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use \Cart as Cart;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Response;
use \Illuminate\Http\Response as Res;

class CurrencyController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = Res::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    public function respond($data, $headers = []){

        return Response::json($data, $this->getStatusCode(), $headers);

    }
    public function initiateSmsGuzzle($quantity, $to)
    {
        $client = new Client();

        $response = $client->get('https://forex.1forge.com/1.0.3/convert?from=CAD&to='.$to.'&quantity='.$quantity.'&api_key=e7CXBXlYzjg8BdmFy5tLEWOZf36uGx1V', [
//            'form_params' => [
//                'key' => $this->KEY,
//                'phone' => $request->input('phone'),
//                'code' => $request->input('otp')
//            ],
        ]);


        $response = json_decode($response->getBody(), true);
        return $response;
    }
}
