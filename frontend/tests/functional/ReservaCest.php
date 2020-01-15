<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class ReservaCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Reservas');
        $I->click('Criar Reserva');

        $I->fillField('input[id=reservaform-data_entrada]',"2020-01-21");
        $I->fillField('input[id=reservaform-data_saida]',"2020-01-30");
        $I->fillField('Num Pessoas','1');
        $I->fillField('Quarto Familia','1');
        $I->click('save-button');

        $I->click('Reservas');
        $I->see('2020-01-21');
    }
}
