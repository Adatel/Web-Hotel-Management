<?php namespace backend\tests;

use backend\models\TipoQuarto;

class tipoquartoTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {
        $tipo_quarto = new TipoQuarto();


        //<---------------------------------------- DESIGNAÇÃO ---------------------------------------->
        $tipo_quarto->setDesignacao(null);
        $this->assertFalse($tipo_quarto->validate(['designacao']));

        $tipo_quarto->setDesignacao(111);
        $this->assertFalse($tipo_quarto->validate(['designacao']));

        $tipo_quarto->setDesignacao("Designacao Teste");
        $this->assertTrue($tipo_quarto->validate(['designacao']));


        //<---------------------------------------- PREÇO UNITÁRIO ---------------------------------------->
        $tipo_quarto->setPrecoNoite(null);
        $this->assertFalse($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite("Preco Noite Teste");
        $this->assertFalse($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite(5);
        $this->assertTrue($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite(5.5);
        $this->assertTrue($tipo_quarto->validate(['preco_noite']));
    }
}