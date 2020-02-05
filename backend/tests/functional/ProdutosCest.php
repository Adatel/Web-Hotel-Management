<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ProdutosCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function criarProduto(FunctionalTester $I)
    {
        //cuidado ao fazer ver se na base de dados teste existe user ou se esta repetido

        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Produtos');
        $I->click('Criar Produto');

        $I->fillField('Designação', 'Produto Teste');
        $I->fillField('Preço Unitário', '50');

        $opcao = $I->grabTextFrom('select option:nth-child(4)');
        $I->selectOption("select", $opcao);

        $I->seeInField("#produto-id_tipo", "Bebidas");
        $I->click('save-button');

        $I->click('Produtos');
        $I->see('Produto Teste');
    }

    public function alterarProduto(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Produtos');
        $I->see('Produtos', 'h1');
        $I->click('Update', 'a');

        $I->see('Update Produto', 'h1');
        $I->click('Save');
        $I->see('Update', 'a');
        $I->see('Delete', 'a');

    }

    public function apagarProduto(FunctionalTester $I)
    {

        $I->amOnPage('/site/login');
        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');

        $I->click('Produtos');
        $I->see('Produtos', 'h1');
        $I->click('Delete', 'a');
    }
}
