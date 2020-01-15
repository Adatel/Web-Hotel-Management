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

        $I->fillField('Nome','Adatel2');
        $I->fillField('Nif','718293652');
        $I->fillField('Telemovel','965012472');
        $I->fillField('Morada','Rua Teste teste');
        $I->fillField('Username','Adatel2');
        $I->fillField('Email','adatel2@gmail.com');
        $I->fillField('Password','123456789');

        $I->click('signup-button');
        $I->see('718293652');
    }
}
