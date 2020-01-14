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


        // <-------- Permissões Reservas --------->
        $createReserva = $auth->createPermission('createReserva');
        $createReserva->description = 'Criar Reserva';
        $auth->add($createReserva);

        $updateReserva = $auth->createPermission('updateReserva');
        $updateReserva->description = 'Atualizar Reserva';
        $auth->add($updateReserva);

        $deleteReserva = $auth->createPermission('deleteReserva');
        $deleteReserva->description = 'Apagar Reserva';
        $auth->add($deleteReserva);

        // <-------- Permissões Pedidos --------->
        $createPedido = $auth->createPermission('createPedido');
        $createPedido->description = 'Criar Pedido';
        $auth->add($createPedido);

        $updatePedido = $auth->createPermission('updatePedido');
        $updatePedido->description = 'Atualizar Pedido';
        $auth->add($updatePedido);

        $deletePedido = $auth->createPermission('deletePedido');
        $deletePedido->description = 'Apagar Pedido';
        $auth->add($deletePedido);

        // <-------- Permissões Quartos --------->
        $createQuarto = $auth->createPermission('createQuarto');
        $createQuarto->description = 'Criar Quarto';
        $auth->add($createQuarto);

        $updateQuarto = $auth->createPermission('updateQuarto');
        $updateQuarto->description = 'Atualizar Quarto';
        $auth->add($updateQuarto);

        $deleteQuarto = $auth->createPermission('deleteQuarto');
        $deleteQuarto->description = 'Apagar Quarto';
        $auth->add($deleteQuarto);

        // <---------------------------- ROLES ---------------------------->
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createReserva);

        $admin = $auth->createRole('Admin');
        $auth -> add($admin);
        $auth -> addChild($admin, $updateReserva, $deleteReserva);
        $auth -> addChild($admin, $cliente);

        $funcionario = $auth->createRole('Funcionário');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $updatePedido);

        $rececionista = $auth->createRole('Rececionista');
        $auth->add($rececionista);
        $auth->addChild($rececionista, $createReserva);

        $auth->assign($admin, 1);
        $auth->assign($cliente, 2);
        $auth->assign($funcionario, 3);


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
