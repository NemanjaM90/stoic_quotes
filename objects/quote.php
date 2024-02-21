<?php
class Quote
{

    //Database connection and tabe name
    private $conn;
    private $table_name = "quotes";

    //Object properties
    public $id;
    public $quote;
    public $philosopher;
    public $category_id;
    public $timestamp;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Create quote
    function create()
    {

        //Write query
        $query = "INSERT INTO " . $this->table_name . " SET quote=:quote, philosopher=:philosopher, category_id=:category_id, created=:created";

        $stmt = $this->conn->prepare($query);

        //Valeus sent thrue Form
        $this->quote = htmlspecialchars(strip_tags($this->quote));
        $this->philosopher = htmlspecialchars(strip_tags($this->philosopher));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        //To get time-stamp for "created" field
        $this->timestamp = date('Y-m-d H:i:s');

        //Bind values
        $stmt->bindParam(":quote", $this->quote);
        $stmt->bindParam(":philosopher", $this->philosopher);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
