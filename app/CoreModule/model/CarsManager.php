<?php


namespace App\CoreModule\model;

use App\Model\DatabaseManager;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;


class CarsManager extends DatabaseManager
{
    const
        TABLE_NAME = 'cars',
        COLUMN_ID = 'id_car';

    public function getCars()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID. ' DESC');
    }

    public function getCar($id)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }

    public function saveCarLocalization($Car)
    {
        if (empty($Car[self::COLUMN_ID])) {
            unset($Car[self::COLUMN_ID]);
            $this->database->table(self::TABLE_NAME)->insert($Car);
        } else
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $Car[self::COLUMN_ID])->update($Car);
    }

    public function removeCar($id)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
    }

}
