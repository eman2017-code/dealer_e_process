<?php
    class BaseModel
    {
        protected static $db_conn;
        
        protected static function &db()
        {
            if (empty(BaseModel::$db_conn))
            {
                BaseModel::$db_conn = @new mysqli('localhost', 'user', 'password', 'db');
                if (BaseModel::$db_conn->connect_error)
                {
                    die('Connect Error: ' . BaseModel::$db_conn->connect_error);
                }
            }
            return BaseModel::$db_conn;
        }
    }
    
    class Model extends BaseModel
    {
        private static $fruit_counts = array('apple'=>3, 'banana'=>4, 'orange'=>0);

        private static $fruit_colors = array('apple'=>'red', 'banana'=>'yellow', 'orange'=>'orange', 'plum'=>'purple');

        function performSqlQuery($array) {
            foreach ($fruit_colors as $key => $value) {
                return "SELECT {$key}, {$fruit_colors['apple']}, FROM 'fruits' ORDER BY {$fruit_name} DESC";
            }
        }
    }
?>