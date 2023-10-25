<?php

namespace Integrador\Sefaz\Parsers;

use Integrador\Sefaz\Entities\Boleto;

class BoletoParser
{
    public static function toXml(Boleto $boleto)
    {
        $xml = new \SimpleXMLElement('<boleto/>');

        

        if (strlen($boleto->cpfCnpj) == 11) {
            $xml->addChild('cpf', $boleto->cpfCnpj);
        } else {
            $xml->addChild('cnpj', $boleto->cpfCnpj);
        }

        $xml->addChild('tipoIdentificacao', $boleto->tipoIdentificacao);
        $xml->addChild('numeroDocumento', $boleto->numeroDocumento);
        $xml->addChild('valorTotal', $boleto->valorTotal);
        $xml->addChild('dataVencimento', $boleto->dataVencimento);
        $xml->addChild('dataAtualizacao', $boleto->dataAtualizacao);
        $xml->addChild('codigoMunicipio', $boleto->codigoMunicipio);
        $xml->addChild('numeroIdentificacao', $boleto->numeroIdentificacao);
        $xml->addChild('uf', $boleto->uf);
        $xml->addChild('anoMesReferencia', $boleto->anoMesReferencia);
        $xml->addChild('anoReferencia', $boleto->anoReferencia);
        $xml->addChild('codigoTributo', $boleto->codigoTributo);
        $xml->addChild('situacao', $boleto->situacao);

        return $xml->asXML();
    }
}