<?php


namespace App\Http\Services;


use App\Http\Proxy\BlingProxy;
use Illuminate\Http\Request;

class BlingService
{
    public function createInvoice(Request $request){

        $filter = new BlingFilter();
        $proxy = new BlingProxy();
        $dataCustomer = $request->post('customer');
        $dataFreight = $request->post('freight');
        $dataOrder = $request->post('order');
        $invoiceXml = $filter->filterInvoiceXml($dataCustomer, $dataFreight, $dataOrder, $dataOrder['items']);

        $dataParse = [
            'xml' => rawurlencode($invoiceXml)
        ];
        $posts = $proxy->setInvoice($dataParse);
        if (isset($posts['retorno']['erros'])) {
            return 'erro ao criar nota fiscal, verifica as váriaveis';
        }

        $invoiceBling = array_shift($posts['retorno']['notasfiscais'])['notaFiscal'];

        $response = $proxy->sendInvoiceForCustomer($invoiceBling['numero'], $invoiceBling['serie'], $dataCustomer['email']);

       return $response;
    }

}
