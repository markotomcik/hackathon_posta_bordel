<?php

namespace App\CoreModule\Model;

use App\Model\DatabaseManager;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;

class DeliveryPlaceManager extends DatabaseManager
{
    const 
        TABLE_NAME = 'odovzdavacie_miesta',
        COLUMN_ID = 'id_address';
    
    public function getDeliveryPlaces()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getDeliveryPlace($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function saveDeliveryPlace($DeliveryPlace)
    {
        if (empty($DeliveryPlace[self::COLUMN_ID])) {
            unset($DeliveryPlace[self::COLUMN_ID]);
            $this->database->table(self::TABLE_NAME)->insert($DeliveryPlace);
        } else
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $DeliveryPlace[self::COLUMN_ID])->update($DeliveryPlace);
    }

    public function removeDeliveryPlace($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }

}

