<?php
namespace CSY2028;
    class DatabaseTable
    {
        public $pdo;
        private $table;
        private $primaryKey;

        public function __construct($pdo, $table, $primaryKey)
        {
            $this->pdo = $pdo;
            $this->table = $table;
            $this->primaryKey = $primaryKey;
        }

        /**
         * @return mixed
         */
        public function getPdo()
        {
            return $this->pdo;
        }

        public function find($field, $value)
        {
            $stmt = $this->pdo->prepare('SELECT * FROM cars.' . $this->table . ' WHERE ' . $field . ' = :value');

            $criteria = [
                'value' => $value
            ];
            $stmt->execute($criteria);

            return $stmt->fetchAll();
        }


        public function findAll()
        {
            $stmt = $this->pdo->prepare('SELECT * FROM cars.' . $this->table);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        public function latest()
        {
            $stmt = $this->pdo->prepare('SELECT * FROM cars.articles order by article_date DESC LIMIT 1');

            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function insert($record)
        {
            $keys = array_keys($record);

            $values = implode(', ', $keys);
            $valuesWithColon = implode(', :', $keys);

            $query = 'INSERT INTO cars.' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

            $stmt = $this->pdo->prepare($query);

            $stmt->execute($record);
        }

        public function delete($id)
        {
            $stmt = $this->pdo->prepare('DELETE FROM cars.' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
            $criteria = [
                'id' => $id
            ];
            $stmt->execute($criteria);
        }

        public function update($record)
        {

            $query = 'UPDATE cars.' . $this->table . ' SET ';

            $parameters = [];
            foreach ($record as $key => $value) {
                $parameters[] = $key . ' = :' . $key;
            }

            $query .= implode(', ', $parameters);
            $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

            $record['primaryKey'] = $record[$this->primaryKey];

            $stmt = $this->pdo->prepare($query);

            $stmt->execute($record);
        }
        public function save($record)
        {
            try {
                $this->insert($record);
            }
            catch (\Exception $e) {
                $this->update($record);
            }
        }




}
