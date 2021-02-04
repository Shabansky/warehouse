<?php

namespace Services;

use PDO;

class Connection
{
    private PDO $connection;

    public function __construct(string $dsn, string $user, string $pass){
        $this->connection = new PDO($dsn,$user,$pass);
    }

    public function get() : PDO{
        return $this->connection;
    }
}