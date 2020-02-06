<?php

use yii\db\Migration;

/**
 * Class m191219_103642_init_rbac
 */
class m191219_103642_init_rbac extends Migration
{
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
        echo "m200206_124014_init_rbac cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        // <------------------------- PERMISSÕES ------------------------->


        // <-------- Permissões Funcionários --------->
        $createFuncionario = $auth->createPermission('createFuncionario');
        $createFuncionario->description = 'Criar Funcionario';
        $auth->add($createFuncionario);

        $updateFuncionario = $auth->createPermission('updateFuncionario');
        $updateFuncionario->description = 'Atualizar Funcionario';
        $auth->add($updateFuncionario);

        $deleteFuncionario = $auth->createPermission('deleteFuncionario');
        $deleteFuncionario->description = 'Apagar Funcionario';
        $auth->add($deleteFuncionario);

        // <-------- Permissões Clientes --------->
        $createCliente = $auth->createPermission('createCliente');
        $createCliente->description = 'Criar Cliente';
        $auth->add($createCliente);

        $updateCliente = $auth->createPermission('updateCliente');
        $updateCliente->description = 'Atualizar Cliente';
        $auth->add($updateCliente);

        $deleteCliente = $auth->createPermission('deleteCliente');
        $deleteCliente->description = 'Apagar Cliente';
        $auth->add($deleteCliente);

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

        // <-------- Permissões Produtos --------->
        $createProduto = $auth->createPermission('createProduto');
        $createProduto->description = 'Criar Produto';
        $auth->add($createProduto);

        $updateProduto = $auth->createPermission('updateProduto');
        $updateProduto->description = 'Atualizar Produto';
        $auth->add($updateProduto);

        $deleteProduto = $auth->createPermission('deleteProduto');
        $deleteProduto->description = 'Apagar Produto';
        $auth->add($deleteProduto);


        // <---------------------------- ROLES ---------------------------->

        $rececionista = $auth->createRole('Rececionista');
        $auth->add($rececionista);
        $auth->addChild($rececionista, $createCliente);
        $auth->addChild($rececionista, $updateCliente);
        $auth->addChild($rececionista, $deleteCliente);
        $auth->addChild($rececionista, $createReserva);
        $auth->addChild($rececionista, $updateReserva);
        $auth->addChild($rececionista, $deleteReserva);

        $funcionario = $auth->createRole('Funcionário');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createQuarto);
        $auth->addChild($funcionario, $updateQuarto);
        $auth->addChild($funcionario, $deleteQuarto);
        $auth->addChild($funcionario, $createProduto);
        $auth->addChild($funcionario, $updateProduto);
        $auth->addChild($funcionario, $deleteProduto);

        $admin = $auth->createRole('Admin');
        $auth->add($admin);
        $auth->addChild($admin, $createFuncionario);
        $auth->addChild($admin, $updateFuncionario);
        $auth->addChild($admin, $deleteFuncionario);
        $auth->addChild($admin, $createPedido);
        $auth->addChild($admin, $updatePedido);
        $auth->addChild($admin, $deletePedido);
        $auth->addChild($admin, $rececionista);
        $auth->addChild($admin, $funcionario);


        // <---------------------------- Atribuição de Roles ---------------------------->

        $auth->assign($admin, 40);
        $auth->assign($funcionario, 26);
        $auth->assign($rececionista, 25);


    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

}
