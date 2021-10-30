<?php
/*
* Database Class
*/
class Database{
    public $hostdb = DB_HOST;
    public $userdb = DB_USER;
    public $passdb = DB_PASS;
    public $namedb = DB_NAME;

    public $link; 
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->hostdb, $this->userdb, $this->passdb, $this->namedb);
        if (!$this->link) {
            $this->error = "Failed to Connect with Database". $this->link->connect_error;
            return false;
        }
    }

    //Select or Read Data
    public function select($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //Insert Data
    public function insert($query){
        $insetData = $this->link->query($query) or die ($this->link.__LINE__);
        if ($insetData) {
            header("Location: index.php?msg=".urlencode("<div class='alert alert-success'>Data inserted Successfull.</div>"));
            exit();
        } else {
            die("Error :(".$this->link->errno.")".$this->link->error);
        }
    }

    //Update Data
    public function update($query){
        $updateData = $this->link->query($query) or die ($this->link.__LINE__);
        if ($updateData) {
            header("Location: index.php?msg=".urlencode("<div class='alert alert-success'>Data Updated Successfull.</div>"));
            exit();
        } else {
            die("Error :(".$this->link->errno.")".$this->link->error);
        }
    }

    //Delete Data
    public function delete($query){
        $deleteData = $this->link->query($query) or die ($this->link.__LINE__);
        if ($deleteData) {
            header("Location: index.php?msg=".urlencode("<div class='alert alert-success'>Data Deleted Successfull.</div>"));
            exit();
        } else {
            die("Error :(".$this->link->errno.")".$this->link->error);
        }
    }
    
}
?>