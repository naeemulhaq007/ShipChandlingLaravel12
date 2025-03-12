<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use GroceryCrud\Core\Exceptions\Exception;
use GroceryCrud\Core\Model;

use Laminas\Db\Sql\Sql;

class CallbackInsert extends Model
{
    public function insertCusomer($data) {
        // Always make sure that we validate our data
        $fields = ['orderDate','requiredDate','shippedDate','status','comments','customerNumber'];

        // Make sure that the insert data has the exact numbers of inputs
        if (count($data) !== count($fields)) {
            throw new Exception("Wrong input");
        }

        // Make sure that we validate all of our inputs
        foreach ($data as $fieldName => $fieldValue) {
            if (!in_array($fieldName, $fields)) {
                throw new Exception("Wrong input");
            }
        }

        $sql = new Sql($this->adapter);
        $insert = $sql->insert('orders');
        $insert->values($data);

        $statement = $sql->prepareStatementForSqlObject($insert);

        $result = $statement->execute();

        // insertId value
        return $result->getGeneratedValue();
    }
}
