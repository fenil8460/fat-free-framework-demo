<?php

class Controller
{
    protected $f3;
    protected $db;

    
    function beforeroute()
    {
       
    }

    function afterroute()
    {
        // your code comes here
    }

    
    function __construct()
    {   
        $f3=Base::instance();
        $this->f3=$f3;

        $db=new DB\SQL(
            $f3->get('dbUrl'),
            $f3->get('dbname'),
            $f3->get('dbpassword'),
            array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
        );

        $this->db=$db;
    }
}