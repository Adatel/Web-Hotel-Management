<?php namespace common\tests;

use common\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $user = new User();

        $user->setUsername(null);
        $this->assertFalse($user->validate(['username']));

        $user->setUsername("tooloooooongnameeeeeeeeeee");
        $this->assertFalse($user->validate(['username']));

        $user->setUsername("Teste");
        $this->assertTrue($user->validate(['username']));
    }
}