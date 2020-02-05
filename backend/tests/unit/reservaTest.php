<?php namespace backend\tests;

use common\models\Reserva;

class reservaTest extends \Codeception\Test\Unit
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
        $reserva = new Reserva();


        // <--------------------------------------------- NUM QUARTOS --------------------------------------------->
        $reserva->setNumQuarto(null);
        $this->assertFalse($reserva->validate(['num_quartos']));

        $reserva->setNumQuarto("Num Quarto teste");
        $this->assertFalse($reserva->validate(['num_quartos']));

        $reserva->setNumQuarto(3);
        $this->assertTrue($reserva->validate(['num_quartos']));


        // <--------------------------------------------- NUM PESSOAS --------------------------------------------->
        $reserva->setNumPessoas(null);
        $this->assertFalse($reserva->validate(['num_pessoas']));

        $reserva->setNumPessoas("Num Pessoas teste");
        $this->assertFalse($reserva->validate(['num_pessoas']));

        $reserva->setNumPessoas(3);
        $this->assertTrue($reserva->validate(['num_pessoas']));


        // <--------------------------------------------- DATA ENTRADA --------------------------------------------->
        $reserva->setDataEntrada(null);
        $this->assertFalse($reserva->validate(['data_entrada']));

        $reserva->setDataEntrada(2020-01-15);
        $this->assertTrue($reserva->validate(['data_entrada']));

        $reserva->setDataEntrada("2020-01-15");
        $this->assertTrue($reserva->validate(['data_entrada']));


        // <--------------------------------------------- DATA SAIDA --------------------------------------------->
        $reserva->setDataSaida(null);
        $this->assertFalse($reserva->validate(['data_saida']));

        $reserva->setDataSaida(2020-01-15);
        $this->assertTrue($reserva->validate(['data_saida']));

        $reserva->setDataSaida("2020-01-15");
        $this->assertTrue($reserva->validate(['data_saida']));
    }


    public function testCriarReserva(){

        $reserva = new Reserva();

        $reserva->num_pessoas = 4;
        $reserva->num_quartos = 3;
        $reserva->quarto_solteiro = 2;
        $reserva->quarto_duplo = 1;
        $reserva->quarto_familia = 0;
        $reserva->quarto_casal = 0;
        $reserva->data_entrada = "2020-02-20";
        $reserva->data_saida = "2020-02-25";
        $reserva->id_cliente = 5;

        $reserva->save();

        $this->tester->seeInDatabase('reserva',['num_pessoas' => 4, 'num_quartos' => 3, 'quarto_solteiro' => 2, 'quarto_duplo' => 1, 'quarto_familia' => 0, 'quarto_casal' => 0, 'data_entrada' => '2020-02-20', 'data_saida' => '2020-02-25', 'id_cliente' => 5]);

    }


    public function testAlterarReserva(){

        $this->tester->updateInDatabase('reserva', array('num_pessoas' => 6, 'num_quartos' => 4, 'quarto_casal' => 1, 'data_saida' => "2020-02-28"), array('data_entrada' => '2020-02-20', 'data_saida' => "2020-02-25"));

        $this->tester->seeInDatabase('reserva',['num_pessoas' => 6, 'num_quartos' => 4, 'quarto_solteiro' => 2, 'quarto_duplo' => 1, 'quarto_familia' => 0, 'quarto_casal' => 1, 'data_entrada' => '2020-02-20', 'data_saida' => '2020-02-28', 'id_cliente' => 5]);

    }


    public function testApagarReserva(){

        $reserva = Reserva::find()
            ->where(['data_entrada' => "2020-02-20", 'id_cliente' => 5])
            ->one();

        $reserva->delete();

        $this->tester->dontSeeInDatabase('reserva', ['num_pessoas' => 6, 'num_quartos' => 4, 'quarto_solteiro' => 2, 'quarto_duplo' => 1, 'quarto_familia' => 0, 'quarto_casal' => 1, 'data_entrada' => '2020-02-20', 'data_saida' => '2020-02-28', 'id_cliente' => 5]);
    }

}