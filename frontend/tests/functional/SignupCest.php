<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{

    public function _before(FunctionalTester $I)
    {

    }


    public function signupSuccess(FunctionalTester $I)
    {
        $I->amOnPage('site/signup');
        $I->fillField('Nome','Registar Cest');
        $I->fillField('Nif','829173465');
        $I->fillField('Telemovel','965012478');
        $I->fillField('Morada','Rua Registar teste');
        $I->fillField('Username','RegistarCest');
        $I->fillField('Email','Registar@Cestgmail.com');
        $I->fillField('Password','123456789');

        $I->click('signup-button');

        $I->seeEmailIsSent();
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }

}
