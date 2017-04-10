<?php 
    class Database{
        public $host = 'localhost';
        public $username = 'root';
        public $password = '';
        public $db_name = 'hms';
        
        public $link;
        public $error;
        
        /*
        * Constructor
        */
        public function __construct(){
//            $this -> host = $host;
//            $this -> username = $username;
//            $this -> password = $password;
//            $this -> db_name = $db_name;
            
            $this -> connect();
        }
        /*
        * Connector
        */       
        private function connect(){
            $this -> link = new mysqli($this -> host, $this -> username, $this -> password, $this -> db_name);
            
            if(! $this -> link){
                $this -> error = 'Connection Failed: ' .$this->link->connect_error;
                return false;
            }
            
        }
        /*
        * Select
        */       
        public function select($query){
            $result = $this->link->query($query) or die($this -> link ->error.__LINE__) ;
            if ($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }
        /*
        * Insert
        */       
        public function insert($query){
            $insert_row = $this->link->query($query) or die($this -> link ->error.__LINE__) ;
            if ($insert_row){
                header("Location: index.php?msg=". urlencode('Record Added'));
                exit();
            }else{
                die('Error : ('. $this->link->errno .') '. $this->link->error);
            }
        }
        
        /*
        * Update
        */       
        public function update($query){
            $insert_row = $this->link->query($query) or die($this -> link ->error.__LINE__) ;
            if ($update_row){
                header("Location: index.php?msg=". urlencode('Record Updated'));
                exit();
            }else{
                die('Error : ('. $this->link->errno .') '. $this->link->error);
            }
        }
        
        /*
        * Delete
        */       
        public function delete($query){
            $delete_row = $this->link->query($query) or die($this -> link ->error.__LINE__) ;
            if ($delete_row){
                header("Location: index.php?msg=". urlencode('Record Deleted'));
                exit();
            }else{
                die('Error : ('. $this->link->errno .') '. $this->link->error);
            }
        }
    }

?>