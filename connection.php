<?php
class connection {

        private $pdo;

        public function __construct($host, $port, $dbname, $username, $password) {
                $pdo = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname.';', $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
        }

        public function query($query, $params = array()) {
                $statement = $this->pdo->prepare($query);
                $statement->execute($params);

                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
                }
        }

}
