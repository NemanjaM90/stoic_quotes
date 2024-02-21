<?php
class Category
{

    //Database connection and table name
    private $conn;
    private $table_name = "categories";

    //Object properties
    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Use for drop-down list
    function read()
    {
        $query = "SELECT id, name FROM " . $this->table_name . " ORDER BY name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    //Used to read category name by ID
    function readName()
    {
        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }
}
