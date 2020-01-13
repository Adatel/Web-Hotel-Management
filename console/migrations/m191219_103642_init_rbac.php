<?php

use yii\db\Migration;

/**
 * Class m191219_103642_init_rbac
 */
class m191219_103642_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;


        // <------------------------- PERMISSÕES ------------------------->
        $createReserva = $auth->createPermission('createReserva');
        $createReserva->description = 'Criar Reserva';
        $auth->add($createReserva);

        $updateReserva = $auth->createPermission('updateReserva');
        $updateReserva->description = 'Atualizar Reserva';
        $auth->add($updateReserva);


        // <---------------------------- ROLES ---------------------------->
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createReserva);

        $admin = $auth->createRole('Admin');
        $auth -> add($admin);
        $auth -> addChild($admin, $updateReserva);
        $auth -> addChild($admin, $cliente);

        $auth->assign($admin, 1);
        $auth->assign($cliente, 2);


    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191219_103642_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191219_103642_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
