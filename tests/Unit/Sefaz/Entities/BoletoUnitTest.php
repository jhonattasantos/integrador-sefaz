<?php 

namespace Tests\Unit\Sefaz\Entities;

use Integrador\Sefaz\Entities\Boleto;
use PHPUnit\Framework\TestCase;

class BoletoUnitTest extends TestCase
{

    private Boleto $boleto;

    public function setUp(): void
    {
        $this->boleto = Boleto::create(
            numeroDocumento: '123456789',
            valorTotal: '100.00',
            dataVencimento: '2021-10-10',
            dataAtualizacao: '2021-10-10',
            codigoMunicipio: '1234567',
            numeroIdentificacao: '123456789',
            cpfCnpj: '123456789',
            uf: 'AL',
            anoMesReferencia: '10/2021',
            anoReferencia: '2021',
            codigoTributo: '00093',
        );
    }

    public function testAttributes()
    {
        $this->assertEquals('123456789', $this->boleto->numeroDocumento);
        $this->assertEquals('100.00', $this->boleto->valorTotal);
        $this->assertEquals('2021-10-10', $this->boleto->dataVencimento);
        $this->assertEquals('2021-10-10', $this->boleto->dataAtualizacao);
        $this->assertEquals('1234567', $this->boleto->codigoMunicipio);
        $this->assertEquals(4, $this->boleto->tipoIdentificacao);
        $this->assertEquals('123456789', $this->boleto->numeroIdentificacao);
        $this->assertEquals('123456789', $this->boleto->cpfCnpj);
        $this->assertEquals('AL', $this->boleto->uf);
        $this->assertEquals('10/2021', $this->boleto->anoMesReferencia);
        $this->assertEquals('2021', $this->boleto->anoReferencia);
        $this->assertEquals('00093', $this->boleto->codigoTributo);
        $this->assertEquals('1', $this->boleto->situacao);
    }

    public function testCreate()
    {
        $this->assertInstanceOf(Boleto::class, $this->boleto);
    }

    public function testToArray()
    {
        $this->assertIsArray($this->boleto->toArray());
        $this->assertArrayHasKey('numeroDocumento', $this->boleto->toArray());
        $this->assertArrayHasKey('valorTotal', $this->boleto->toArray());
        $this->assertArrayHasKey('dataVencimento', $this->boleto->toArray());
        $this->assertArrayHasKey('dataAtualizacao', $this->boleto->toArray());
        $this->assertArrayHasKey('codigoMunicipio', $this->boleto->toArray());
        $this->assertArrayHasKey('tipoIdentificacao', $this->boleto->toArray());
        $this->assertArrayHasKey('numeroIdentificacao', $this->boleto->toArray());
        $this->assertArrayHasKey('cpfCnpj', $this->boleto->toArray());
        $this->assertArrayHasKey('uf', $this->boleto->toArray());
        $this->assertArrayHasKey('anoMesReferencia', $this->boleto->toArray());
        $this->assertArrayHasKey('anoReferencia', $this->boleto->toArray());
        $this->assertArrayHasKey('codigoTributo', $this->boleto->toArray());
        $this->assertArrayHasKey('situacao', $this->boleto->toArray());
    }
}