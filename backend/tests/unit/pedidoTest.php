<?php namespace backend\tests;

use backend\models\Pedido;

class pedidoTest extends \Codeception\Test\Unit
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
        $pedido = new Pedido();


        //<----------------------------------- DATA HORA ----------------------------------->
        $pedido->setDataHora(null);
        $this->assertFalse($pedido->validate(['data_hora']));

        $pedido->setDataHora(2020-01-15);
        $this->assertTrue($pedido->validate(['data_hora']));

        $pedido->setDataHora("2020-01-15");
        $this->assertTrue($pedido->validate(['data_hora']));


        //<----------------------------------- CUSTO ----------------------------------->
        $pedido->setCusto(null);
        $this->assertFalse($pedido->validate(['custo']));

        $pedido->setCusto("custo teste");
        $this->assertFalse($pedido->validate(['custo']));

        $pedido->setCusto(15);
        $this->assertTrue($pedido->validate(['custo']));

        $pedido->setCusto(15.5);
        $this->assertTrue($pedido->validate(['custo']));
    }
}