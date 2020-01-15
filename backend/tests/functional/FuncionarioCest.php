<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class FuncionarioCest
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

        $I->click('Funcionários');
        $I->click('Registar Funcionário');

        $I->fillField('Nome','Funcionario Cest');
        $I->fillField('Nif','937182645');
        $I->fillField('Telemovel','965012478');
        $I->fillField('Morada','Rua Funcionario teste');
        $I->fillField('Username','FuncionarioCest');
        $I->fillField('Email','FuncionarioCest@gmail.com');
        $I->fillField('Password','123456789');

        $I->click('signup-button');
        $I->see('937182645');
    }
}
