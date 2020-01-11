<?php

namespace common\models;

use backend\models\Pedido;
use Yii;

/**
 * This is the model class for table "reserva_quarto".
 *
 * @property int $id
 * @property int $id_reserva
 * @property int $id_quarto
 *
 * @property Pedido[] $pedidos
 * @property Reserva $reserva
 * @property Quarto $quarto
 */
class ReservaQuarto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva_quarto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'id_quarto'], 'required'],
            [['id_reserva', 'id_quarto'], 'integer'],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id']],
            [['id_quarto'], 'exist', 'skipOnError' => true, 'targetClass' => Quarto::className(), 'targetAttribute' => ['id_quarto' => 'num_quarto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_reserva' => 'Id Reserva',
            'id_quarto' => 'Id Quarto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_reservaquarto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'id_reserva']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuarto()
    {
        return $this->hasOne(Quarto::className(), ['num_quarto' => 'id_quarto']);
    }


    // <----------------- Métodos para API ----------------->

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $id=$this->id;
        $id_reserva=$this->id_reserva;
        $id_quarto=$this->id_quarto;

        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->id_reserva=$id_reserva;
        $myObj->id_quarto=$id_quarto;
        $myJSON = json_encode($myObj);
        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $reserva_id= $this->id;
        $myObj=new \stdClass();
        $myObj->id=$reserva_id;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "192.168.1.67";
        $port = 8081;
        $username = "Diana"; // set your username
        $password = "123456789"; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \backend\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else {
            file_put_contents('debug.output','Time out!');
         }
    }
}
