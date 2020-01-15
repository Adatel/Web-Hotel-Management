<?php namespace backend\tests;

use app\models\Produto;

class produtoTest extends \Codeception\Test\Unit
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
        $produto = new Produto();


        //<---------------------------------------- DESIGNAÇÃO ---------------------------------------->
        $produto->setDesignacao(null);
        $this->assertFalse($produto->validate(['designacao']));

        $produto->setDesignacao(111);
        $this->assertFalse($produto->validate(['designacao']));

        $produto->setDesignacao("Designacao Teste");
        $this->assertTrue($produto->validate(['designacao']));


        //<---------------------------------------- PREÇO POR NOITE ---------------------------------------->
        $produto->setPrecoUnitario(null);
        $this->assertFalse($produto->validate(['preco_unitario']));

        $produto->setPrecoUnitario("Preco Unitario Teste");
        $this->assertFalse($produto->validate(['preco_unitario']));

        $produto->setPrecoUnitario(5);
        $this->assertTrue($produto->validate(['preco_unitario']));

        $produto->setPrecoUnitario(5.5);
        $this->assertTrue($produto->validate(['preco_unitario']));
    }
}