<?php
namespace backend\tests;

use backend\models\Produto;
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

    public function testCriarProfile(){

        $profile = new Profile();

        $profile->nome = "UnitTest";
        $profile->nif = 134256172;
        $profile->telemovel = 267291248;
        $profile->morada = "UnitTest";
        $profile->is_admin = 1;
        $profile->is_funcionario = 0;
        $profile->is_cliente = 0;
        $profile->id_user = 25;

        $profile->save();

        $this->tester->seeInDatabase('profile',['nome' => "UnitTest", 'nif' => 134256172, 'telemovel' => 267291248, 'morada' => "UnitTest", 'is_admin' => 1, 'is_funcionario' => 0, 'is_cliente' => 0, 'id_user' => 25]);

    }


    public function testAlterarProfile(){

        $this->tester->updateInDatabase('profile', array('nome' => "TestUnit", 'morada' => "TestUnit"), array('nome' => "UnitTest", 'nif' => 134256172));

        $this->tester->seeInDatabase('profile',['nome' => "TestUnit", 'nif' => 134256172, 'telemovel' => 267291248, 'morada' => "TestUnit", 'is_admin' => 1, 'is_funcionario' => 0, 'is_cliente' => 0, 'id_user' => 25]);

    }


    public function testApagarProfile(){

        $profile = Profile::find()
            ->where(['nome' => "TestUnit", 'morada' => "TestUnit"])
            ->one();

        $profile->delete();

        $this->tester->dontSeeInDatabase('profile', ['nome' => "TestUnit", 'nif' => 134256172, 'telemovel' => 267291248, 'morada' => "TestUnit", 'is_admin' => 1, 'is_funcionario' => 0, 'is_cliente' => 0, 'id_user' => 25]);
    }

}