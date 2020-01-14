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
        //$this->assertTrue($this->tester->seeInDatabase('profile', ['nome' => 'Diana Gomes']));
        $profile = new Profile();

        $profile->nome = null;
        $this->assertFalse($profile->validate(['nome']));

        $profile->setNome("tooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeeetooloooooongnameeeeeeeeeee");
        $this->assertFalse($profile->validate(['nome']));

        $profile->setNome("Teste");
        $this->assertTrue($profile->validate(['nome']));
    }
}