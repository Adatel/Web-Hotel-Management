<?php namespace backend\tests;

use backend\models\Produto;

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

    public function testCriarProduto(){

        $produto = new Produto();

        $produto->designacao = "Bacalhau";
        $produto->preco_unitario = 4;
        $produto->id_tipo = 2;

        $produto->save();

        $this->tester->seeInDatabase('produto', ['designacao' => "Bacalhau", 'preco_unitario' => 4, 'id_tipo' => 2]);

    }


    public function testAlterarProduto(){

        $this->tester->updateInDatabase('produto', array('designacao' => "Bacalhau com Natas", 'preco_unitario' => 6), array('designacao' => "Bacalhau", 'preco_unitario' => 4));

        $this->tester->seeInDatabase('produto', ['designacao' => "Bacalhau com Natas", 'preco_unitario' => 6, 'id_tipo' => 2]);

    }


    public function testApagarProduto(){

        $produto = Produto::find()
            ->where(['designacao' => "Bacalhau com Natas", 'preco_unitario' => 6])
            ->one();

        $produto->delete();

        $this->tester->dontSeeInDatabase('produto', ['designacao' => "Bacalhau com Natas", 'preco_unitario' => 6, 'id_tipo' => 2]);
    }

}