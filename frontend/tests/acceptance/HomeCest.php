<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('Adatel');

        $I->seeLink('Sobre');
        $I->click('Sobre');
        $I->wait(2); // wait for page to be opened

        $I->see('Informações do Hotel');

        $I->seeLink('Entrar');
        $I->click('Entrar');
        $I->wait(2);

        $I->see('Entrar');

        $I->fillField('Username', 'Adatel');
        $I->fillField('Password', '123456789');
        $I->click('login-button');
        $I->wait(2);

        $I->see('Terminar Sessão (Adatel)');
    }
}
