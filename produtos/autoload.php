<?php
    function __autoload($class_name)
    {
        $raiz = $_SERVER['DOCUMENT_ROOT'];
        
        //class directories
        $directorys = array(
            $raiz.'/cursoPHP/produtos/App/DAO/',
            $raiz.'/cursoPHP/produtos/App/DB/',
            $raiz.'/cursoPHP/produtos/App/Interface/',
            $raiz.'/cursoPHP/produtos/App/Model/'
        );
       
        //for each directory
        foreach($directorys as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else
                return;
            }           
        }
    }
    ?>