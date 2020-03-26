<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\BlingService;

class BlingController extends Controller
{

    public function createInvoice(Request $request){

        $invoice = new BlingService;
        $invoice->createInvoice($request);

        return $invoice;
    }

}
