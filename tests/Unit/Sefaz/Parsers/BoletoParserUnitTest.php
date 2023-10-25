<?php 

namespace Tests\Unit\Sefaz\Parsers;

use Integrador\Sefaz\Entities\Boleto;
use Integrador\Sefaz\Parsers\BoletoParser;
use PHPUnit\Framework\TestCase;

class BoletoParserUnitTest extends TestCase
{
    private Boleto $boletoComCPF;
    private Boleto $boletoComCNPJ;

    public function setUp(): void
    {
        $this->boletoComCPF = Boleto::create(
            numeroDocumento: '123456789',
            valorTotal: '100.00',
            dataVencimento: '2021-10-10',
            dataAtualizacao: '2021-10-10',
            codigoMunicipio: '1234567',
            numeroIdentificacao: '123456789',
            cpfCnpj: '711.591.990-94',
            uf: 'AL',
            anoMesReferencia: '10/2021',
            anoReferencia: '2021',
            codigoTributo: '00093',
        );

        $this->boletoComCNPJ = Boleto::create(
            numeroDocumento: '123456789',
            valorTotal: '100.00',
            dataVencimento: '2021-10-10',
            dataAtualizacao: '2021-10-10',
            codigoMunicipio: '1234567',
            numeroIdentificacao: '123456789',
            cpfCnpj: '71.159.199/0001-94',
            uf: 'AL',
            anoMesReferencia: '10/2021',
            anoReferencia: '2021',
            codigoTributo: '00093',
        );
    }
    
    public function testToXmlWhenCpf()
    {

        $xml = BoletoParser::toXml($this->boletoComCPF);

        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0"?>
            <boleto>
                <cpf>71159199094</cpf>
                <tipoIdentificacao>3</tipoIdentificacao>
                <numeroDocumento>123456789</numeroDocumento>
                <valorTotal>100.00</valorTotal>
                <dataVencimento>2021-10-10</dataVencimento>
                <dataAtualizacao>2021-10-10</dataAtualizacao>
                <codigoMunicipio>1234567</codigoMunicipio>
                <numeroIdentificacao>123456789</numeroIdentificacao>
                <uf>AL</uf>
                <anoMesReferencia>10/2021</anoMesReferencia>
                <anoReferencia>2021</anoReferencia>
                <codigoTributo>00093</codigoTributo>
                <situacao>1</situacao>
            </boleto>',
            $xml
        );
    }

    public function testToXmlWhenCnpj()
    {
        
        $xml = BoletoParser::toXml($this->boletoComCNPJ);

        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0"?>
            <boleto>
                <cnpj>71159199000194</cnpj>
                <tipoIdentificacao>4</tipoIdentificacao>
                <numeroDocumento>123456789</numeroDocumento>
                <valorTotal>100.00</valorTotal>
                <dataVencimento>2021-10-10</dataVencimento>
                <dataAtualizacao>2021-10-10</dataAtualizacao>
                <codigoMunicipio>1234567</codigoMunicipio>
                <numeroIdentificacao>123456789</numeroIdentificacao>
                <uf>AL</uf>
                <anoMesReferencia>10/2021</anoMesReferencia>
                <anoReferencia>2021</anoReferencia>
                <codigoTributo>00093</codigoTributo>
                <situacao>1</situacao>
            </boleto>',
            $xml
        );
    }
}