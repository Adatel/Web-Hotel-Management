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
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Clientes');
        $I->click('Registar Cliente');

        $I->fillField('Nome','Teste Cest');
        $I->fillField('Nif','718293654');
        $I->fillField('Telemovel','965012478');
        $I->fillField('Morada','Rua Teste teste');
        $I->fillField('Username','TestCest');
        $I->fillField('Email','TestCest@gmail.com');
        $I->fillField('Password','123456789');

        $I->click('signup-button');
        $I->see('718293654');
    }
}
