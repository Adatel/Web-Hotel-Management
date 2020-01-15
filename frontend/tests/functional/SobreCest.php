<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SobreCest
{
    public function checkSobre(FunctionalTester $I)
    {
        $I->amOnRoute('site/about');
        $I->see('Informações do Hotel', 'h1');
    }
}
