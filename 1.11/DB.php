<?php
class DB
{
    public $pdo;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=work_tracker';
        $this->pdo = new PDO($dsn,'root','20071010');
        return $this->pdo;
    }
}
?>