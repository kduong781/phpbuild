<?php

class Database{
    /*database info **need to define in php file */
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $port = DB_PORT;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;

    private $stmt;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname;

        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
              );
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    /*Binds value for prepared statement*/
    public function bind($param, $value, $type = null){
      if (is_null($type)) {
          switch (true) {
              case is_int($value):
                  $type = PDO::PARAM_INT;
                  break;
              case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
              case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
              default:
                  $type = PDO::PARAM_STR;
          }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    /*Sets up Prepared Statement*/
    public function query($query){
      $this->stmt = $this->dbh->prepare($query);
    }
    /*Executes query*/
    public function execute(){
      return $this->stmt->execute();
    }
    /*Returns Single Row */
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    /*Returns Result Set*/
    public function resultset(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

 ?>
