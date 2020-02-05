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


        //<---------------------------------------- PREÇO POR NOITE ---------------------------------------->
        $tipo_quarto->setPrecoNoite(null);
        $this->assertFalse($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite("Preco Noite Teste");
        $this->assertFalse($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite(5);
        $this->assertTrue($tipo_quarto->validate(['preco_noite']));

        $tipo_quarto->setPrecoNoite(5.5);
        $this->assertTrue($tipo_quarto->validate(['preco_noite']));
    }

    public function testCriarTipoquarto(){

        $tipoquarto = new TipoQuarto();

        $tipoquarto->designacao = "Suite";
        $tipoquarto->preco_noite = 35;

        $tipoquarto->save();

        $this->tester->seeInDatabase('tipo_quarto', ['designacao' => "Suite", 'preco_noite' => 35]);

    }


    public function testAlterarTipoquarto(){

        $this->tester->updateInDatabase('tipo_quarto', array('designacao' => "Suite Test", 'preco_noite' => 40), array('designacao' => "Suite", 'preco_noite' => 35));

        $this->tester->seeInDatabase('tipo_quarto', ['designacao' => "Suite Test", 'preco_noite' => 40]);

    }


    public function testApagarTipoquarto(){

        $tipoquarto = TipoQuarto::find()
            ->where(['designacao' => "Suite Test", 'preco_noite' => 40])
            ->one();

        $tipoquarto->delete();

        $this->tester->dontSeeInDatabase('tipo_quarto', ['designacao' => "Suite Test", 'preco_noite' => 40]);
    }

}