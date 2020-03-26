<?php


namespace App\Http\Services;


class BlingFilter
{

    public function filterInvoiceXml(array $dataCustomer, array $dataFreight, array $dataOrder, array $dataItems)
    {
        $formatXml ='<?xml version="1.0" encoding="UTF-8"?>
                <pedido>
                    <cliente>
                        <nome>'.$dataCustomer['name'].'</nome>
                        <tipoPessoa>'.$dataCustomer['person_type'].'</tipoPessoa>
                        <cnpj>'.$dataCustomer['cpf_cnpj'].'</cnpj>
                        <ie_rg>'.$dataCustomer['ie_rg'].'</ie_rg>
                        <endereco>'.$dataCustomer['address'].'</endereco>
                        <numero>'.$dataCustomer['number'].'</numero>
                        <complemento>'.$dataCustomer['complement'].'</complemento>
                        <bairro>'.$dataCustomer['neighborhood'].'</bairro>
                        <cep>'.$dataCustomer['cep'].'</cep>
                        <cidade>'.$dataCustomer['city'].'</cidade>
                        <uf>'.$dataCustomer['country'].'</uf>
                        <fone>'.$dataCustomer['phone'].'</fone>
                        <email>'.$dataCustomer['email'].'</email>
                    </cliente>
                    <transporte>
                        <transportadora>'.$dataFreight['name'].'</transportadora>
                        <cpf_cnpj>'.$dataFreight['cnpj'].'</cpf_cnpj>
                        <ie_rg>'.$dataFreight['ie'].'</ie_rg>
                        <endereco>'.$dataFreight['address'].', '.$dataFreight['number'].'</endereco>
                        <cidade>'.$dataFreight['city'].'</cidade>
                        <uf>'.$dataFreight['state'].'</uf>
                        <placa></placa>
                        <uf_veiculo></uf_veiculo>
                        <tipo_frete>R</tipo_frete>
                        <qtde_volumes>'.$dataOrder['qtd'].'</qtde_volumes>
                        <especie>Volumes</especie>
                        <numero>'.$dataFreight['number'].'</numero>
                        <peso_bruto>'.$dataFreight['weight'].'</peso_bruto>
                        <peso_liquido>'.$dataFreight['weight'].'</peso_liquido>
                        <servico_correios></servico_correios>
                        <dados_etiqueta>
                            <nome>'.$dataFreight['tag_name'].'</nome>
                            <endereco>'.$dataFreight['address'].'</endereco>
                            <numero>'.$dataFreight['number'].'</numero>
                            <complemento>'.$dataFreight['complement'].'</complemento>
                            <municipio>'.$dataFreight['city'].'</municipio>
                            <uf>'.$dataFreight['state'].'</uf>
                            <cep>'.$dataFreight['cep'].'</cep>
                            <bairro>'.$dataFreight['neighborhood'].'</bairro>
                        </dados_etiqueta>
                        <volumes>
                            <volume>
                                <servico>'.$dataFreight['name'].' - CONTRATO</servico>
                                <codigoRastreamento></codigoRastreamento>
                            </volume>
                            <volume>
                                <servico>'.$dataFreight['name'].' - CONTRATO</servico>
                                <codigoRastreamento></codigoRastreamento>
                            </volume>
                        </volumes>
                    </transporte>
                    <itens>
                        '.$dataItems.'
                    </itens>
                    <vlr_frete>'.$dataOrder['name'].'</vlr_frete>
                    <vlr_seguro>'.$dataOrder['name'].'</vlr_seguro>
                    <vlr_despesas>'.$dataOrder['name'].'</vlr_despesas>
                    <vlr_desconto>'.$dataOrder['name'].'</vlr_desconto>
                    <obs>'.$dataOrder['name'].'</obs>
                </pedido>';
        return $formatXml;

    }



    public function filterXmlItems( array $data){

        $formatXml = '';
        foreach ($data as $item) {
            $formatXml1 =
                '<item>
                            <codigo>' . $item['sku'] . '</codigo>
                            <descricao>' . $item['description'] . '</descricao>
                            <un>un</un>
                            <qtde>' . $item['qtd'] . '</qtde>
                            <vlr_unit>' . $item['value'] . '</vlr_unit>
                            <tipo>P</tipo>
                            <peso_bruto>' . $item['weight'] . '</peso_bruto>
                            <peso_liq>' . $item['weight'] . '</peso_liq>
                            <class_fiscal>####.##.##</class_fiscal>
                            <origem>0</origem>
                        </item>';
            $formatXml = $formatXml.$formatXml1;
        }
        return $formatXml;
    }
}
