<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class QuartosCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function criarQuarto(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Quartos');
        $I->click('Criar Quarto');
        $I->fillField('Número do Quarto', '11');

        $opcao = $I->grabTextFrom('select option:nth-child(3)');
        $I->selectOption("select", $opcao);

        $I->fillField('Estado', '0');
        $I->seeInField("#quarto-id_tipo", "Quarto Duplo");
        $I->click('save-quarto');

        $I->click('Quartos');
        $I->see('11');
    }

    public function alterarQuarto(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Quartos');
        $I->see('Quartos', 'h1');
        $I->click('Update', 'a');

        $I->see('Update Quarto', 'h1');
        $I->fillField('Estado', '0');

        $I->click('save-quarto');
        $I->see('Update', 'a');
        $I->see('Delete', 'a');

    }

    public function apagarQuarto(FunctionalTester $I)
    {

        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Quartos');
        $I->see('Quartos', 'h1');
        $I->click('Delete', 'a');
    }
}
