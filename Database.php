<?php 
class Database{    
    private $dbhost  = "<HOST>";
    private $dbuser  = "<DATABASE_USERNAME>";
    private $dbpassw = "<DATABASE_PASSWORD">;
    private $dbname  = "<DATABASE_NAME>";

    public $mysqli;

    public function __construct(){
        $this->mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpassw, $this->dbname);

        if ($this->mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $this->mysqli->connect_error);
            exit();
        }

        return $this->mysqli;
    }


    public function login($username, $password) {
        $result = $this->mysqli->query("SELECT username, firstname, lastname, email, password FROM users WHERE username='$username' AND password='$password';");
        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    public function get_users() {        
        $result = $this->mysqli->query('SELECT username, firstname, lastname, email, password FROM users;');
        return $result;
    }
}
