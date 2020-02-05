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

    public function testCriarPedido(){

        $pedido = new Pedido();

        $pedido->data_hora = "2020-02-07 20:00";
        $pedido->custo = 5;
        $pedido->id_reservaquarto = 1;

        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['data_hora' => "2020-02-07 20:00", 'custo' => 5, 'id_reservaquarto' => 1]);

    }


    public function testAlterarPedido(){

        $this->tester->updateInDatabase('pedido', array('data_hora' => "2020-02-10 19:30", 'custo' => 8), array('data_hora' => "2020-02-07 20:00", 'id_reservaquarto' => 1));

        $this->tester->seeInDatabase('pedido', ['data_hora' => "2020-02-10 19:30", 'custo' => 8]);

    }


    public function testApagarPedido(){

        $pedido = Pedido::find()
            ->where(['data_hora' => "2020-02-10 19:30", 'id_reservaquarto' => 1])
            ->one();

        $pedido->delete();

        $this->tester->dontSeeInDatabase('pedido', ['data_hora' => "2020-02-10 19:30", 'custo' => 8, 'id_reservaquarto' => 1]);
    }

}