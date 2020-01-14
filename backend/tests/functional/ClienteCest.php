<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ClienteCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Alex');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Clientes');
        $I->click('Registar Cliente');

        $I->fillField('Nome','Teste Cest');
        $I->fillField('Nif','');
    }
}
