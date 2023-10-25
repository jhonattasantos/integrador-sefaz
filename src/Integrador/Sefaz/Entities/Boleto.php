<?php

namespace Integrador\Sefaz\Entities;

use Integrador\Sefaz\Entities\Traits\MethodsMagicsTrait;
use Integrador\Sefaz\Parsers\BoletoParser;

class Boleto
{
    use MethodsMagicsTrait;

    public function __construct(
         protected string $numeroDocumento,
         protected string $valorTotal,
         protected string $dataVencimento,
         protected string $dataAtualizacao,
         protected string $codigoMunicipio,
         protected string $tipoIdentificacao,
         protected string $numeroIdentificacao,
         protected string $cpfCnpj,
         protected string $uf = 'AL',
         protected string $anoMesReferencia = '',
         protected string $anoReferencia = '',
         protected string $codigoTributo = '00093',
         protected string $situacao = '1'
    ){}

    public static function create(
        string $numeroDocumento,
        string $valorTotal,
        string $dataVencimento,
        string $dataAtualizacao,
        string $codigoMunicipio,
        string $numeroIdentificacao,
        string $cpfCnpj,
        string $uf,
        string $anoMesReferencia = '',
        string $anoReferencia = '',
        string $codigoTributo = '',
        string $situacao = '1'
    )
    {

        $cpfCnpj = str_replace('.', '', $cpfCnpj);
        $cpfCnpj = str_replace('/', '', $cpfCnpj);
        $cpfCnpj = str_replace('-', '', $cpfCnpj);

        $tipoIdentificacao = strlen($cpfCnpj) == 11 ? '3' : '4';

        return new Boleto(
            $numeroDocumento,
            $valorTotal,
            $dataVencimento,
            $dataAtualizacao,
            $codigoMunicipio,
            $tipoIdentificacao,
            $numeroIdentificacao,
            $cpfCnpj,
            $uf,
            $anoMesReferencia,
            $anoReferencia,
            $codigoTributo,
            $situacao
        );
    }

    public function toXml()
    {
        return BoletoParser::toXml($this);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

}