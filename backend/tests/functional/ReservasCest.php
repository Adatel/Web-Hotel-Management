<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use common\models\Profile;
use common\models\Reserva;
use common\models\User;
use WebDriverKeys;

class ReservasCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function criarReserva(FunctionalTester $I)
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
        $I->fillField('Nif','738291645');
        $I->click('save-button');

        $I->see('Reservas');
    }

    public function alterarReserva(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Reservas');
        $I->see('Reservas', 'h1');
        $I->click('Update', 'a');

        $I->see('Update Reserva', 'h1');
        $I->click('Alterar Reserva');
        $I->see('Update', 'a');
        $I->see('Delete', 'a');

    }

    public function apagarReserva(FunctionalTester $I)
    {

        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Reservas');
        $I->see('Reservas', 'h1');
        $I->click('Delete', 'a');
        //$I->acceptPopup('OK');
        //$I->click('OK');
    }

}
