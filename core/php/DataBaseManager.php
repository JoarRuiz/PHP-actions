<?php

namespace MyApp\Core;

class DataBaseManager {

    const SERVER = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DB = 'memorama';

    private $mysqli;
    private static $_instance = null;

    /**
     * DataBaseManager constructor.
     * @param $mysqli
     */
    private function __construct() {
        $this->mysqli = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD, self::DB);
        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }

        if (!$this->mysqli->set_charset('utf8')) {
            printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->mysqli->error);
            exit;
        }
    }

    public function __destruct() {
        self::$_instance = null;
        $this->mysqli = null;
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new DataBaseManager();
        }
        return self::$_instance;
    }

    final public function __clone() {
        throw new Exception('Only one instance is allowed');
    }

    public function insertQuery($query) {
        return $this->mysqli->query($query);
    }

    public function realizeQuery($query) {
        if ($result = $this->mysqli->query($query)) {
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        } else {
            return null;
        }
    }

    public function close() {
        $this->mysqli->close();
    }

}
