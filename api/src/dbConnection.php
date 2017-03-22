<?php

        const DB_NAME = 'Project_CL_Homework_Library';
        const DB_USER = 'root';
        const DB_PASSWORD = 'coderslab';
        const DB_HOST = 'localhost';

        $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8;', 
                            DB_USER, 
                            DB_PASSWORD,
                            [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
                           );


