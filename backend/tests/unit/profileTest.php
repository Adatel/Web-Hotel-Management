<?php
namespace backend\tests;

use common\models\Profile;

class profileTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {
        //<---------------------------------------------------- NOME ---------------------------------------------------->
        $profile = new Profile();

        $profile->nome = null;
        $this->assertFalse($profile->validate(['nome']));

        $profile->setNome("tooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeee");
        $this->assertFalse($profile->validate(['nome']));

        $profile->setNome("Teste");
        $this->assertTrue($profile->validate(['nome']));


        //<---------------------------------------------------- NIF ---------------------------------------------------->
        $profile->setNif(null);
        $this->assertFalse($profile->validate(['nif']));

        $profile->setNif("nif teste");
        $this->assertFalse($profile->validate(['nif']));

        $profile->setNif(987654321);
        $this->assertTrue($profile->validate(['nif']));


        //<---------------------------------------------------- MORADA ---------------------------------------------------->
        $profile->setMorada(null);
        $this->assertFalse($profile->validate(['morada']));

        $profile->setMorada("tooooloooongmoradaaaaaaaaaaaaaaaaaaatooooloooongmoradaaaaaaaaaaaaaaaaaaatooooloooongmoradaaaaaaaaaaaaaaaaaaa");
        $this->assertFalse($profile->validate(['morada']));

        $profile->setMorada("Rua teste");
        $this->assertTrue($profile->validate(['morada']));


        //<---------------------------------------------------- TELEMOVEL ---------------------------------------------------->
        $profile->setTelemovel(null);
        $this->assertFalse($profile->validate(['telemovel']));

        $profile->setTelemovel("telemovel teste");
        $this->assertFalse($profile->validate(['telemovel']));

        $profile->setTelemovel(915432678);
        $this->assertTrue($profile->validate(['telemovel']));

    }
}