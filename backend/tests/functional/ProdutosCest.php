<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ProdutosCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        //cuidado ao fazer ver se na base de dados teste existe user ou se esta repetido

        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Alex');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Produtos');
        $I->click('Criar Produto');
        $I->fillField('Designação', 'Cest');
        $I->fillField('Preço Unitário', '100');

        $opcao = $I->grabTextFrom('select option:nth-child(4)');
        $I->selectOption("select", $opcao);

        $I->seeInField("#produto-id_tipo", "Bebidas");
        $I->click('save-button');

        $I->click('Produtos');
        $I->see('Cest');
    }
}
