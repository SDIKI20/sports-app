<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // الحل 1: إذا كان config.php يحتوي على المنفذ في DB_HOST
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        
        // الحل 2: إذا أردت تحديد المنفذ مباشرة (أوصي بهذا)
        // $dsn = 'mysql:host=localhost;port=3307;dbname=' . $this->dbname;
        
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            if(defined('SHOW_DB_MESSAGES') && SHOW_DB_MESSAGES){
                echo "✅ تم الاتصال بقاعدة البيانات بنجاح!";
            } else {
                error_log('Database connected successfully.');
            }
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            if(defined('SHOW_DB_MESSAGES') && SHOW_DB_MESSAGES){
                echo "❌ خطأ في الاتصال: " . $this->error;
            } else {
                error_log('Database connection error: ' . $this->error);
            }
        }
    }

    // باقي الدوال تبقى كما هي...
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
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

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
}