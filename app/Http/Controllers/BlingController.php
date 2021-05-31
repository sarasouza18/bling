<?php


namespace App\Http\Controllers;


use App\Http\Requests\BlingRequest;
use App\Http\Services\BlingService;
use Symfony\Component\HttpFoundation\Response;

class BlingController extends Controller
{

    public function createInvoice(BlingRequest $request){

        $invoice = new BlingService;
        $response = $invoice->createInvoice($request);

        return Response::create($response);
    }

}
