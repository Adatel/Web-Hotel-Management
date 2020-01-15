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
}