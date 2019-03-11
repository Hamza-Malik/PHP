<?php
namespace Ijdb\Controllers;
class Routes implements \CSY2028\Routes {
 public function getRoutes()
 {

     {
         require '../database.php';
         $manufactureTable = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
         $manufactureController = new \Ijdb\Controllers\ManufactureController($manufactureTable);

         $carsTable = new  \CSY2028\DatabaseTable($pdo, 'cars', 'id');
         $carController = new \Ijdb\Controllers\ CarController($carsTable, $manufactureTable);

         $adminTable = new \CSY2028\ DatabaseTable($pdo, 'admins', 'id');
         $adminController = new \Ijdb\Controllers\  AdminController($adminTable);

         $contactTable = new \CSY2028\ DatabaseTable($pdo, 'contactus', 'id');
         $contactController = new \Ijdb\Controllers\  ContactController($contactTable);

         $articleTable = new \CSY2028\ DatabaseTable($pdo, 'articles', 'id');
         $articleController = new \Ijdb\Controllers\ ArticleController($articleTable);

         $routes = [
             'home' => [
                 'GET' => [
                     'controller' => $articleController,
                     'function' => 'home']
             ],
             'about' => [
                 'GET' => [
                     'controller' => $contactController,
                     'function' => 'about']
             ],
             'clairs' => [
                 'GET' => [
                     'controller' => $contactController,
                     'function' => 'clair']
             ],


             'login' => [
                 'GET' => [
                     'controller' => $adminController,
                     'function' => 'verify'],
                 //  'admin'=> true,


                 'POST' => [
                     'controller' => $adminController,
                     'function' => 'verify'],
                 //   'admin'=> true,


             ],
             'logout' => [
                 'GET' => [
                     'controller' => $adminController,
                     'function' => 'logoutHome'],
                 //'admin'=>false,

                  'admin'=>false

             ],

             'delete_article' => [

                 'POST' => [
                     'controller' => $articleController,
                     'function' => 'delete'],
                 'admin' => true,
             ],

             'delete_manufacturer' => [

                 'POST' => [
                     'controller' => $manufactureController,
                     'function' => 'delete'],
                 'admin' => true,
             ],

             'delete_admin' => [

                 'POST' => [
                     'controller' => $adminController,
                     'function' => 'delete'],
                 'admin' => true,
             ],

             'delete_car' => [

                 'POST' => [
                     'controller' => $carController,
                     'function' => 'delete'],
                 'admin' => true,
             ],
             'edit_article' => [
                 'GET' => [
                     'controller' => $articleController,
                     'function' => 'editForm'],
                 'admin' => true,
                 'POST' => [
                     'controller' => $articleController,
                     'function' => 'editSubmit'],
                   // 'admin' => true,
             ],
             'edit_manufacturer' => [
                 'GET' => [
                     'controller' => $manufactureController,
                     'function' => 'editForm'],
               //  'admin' => true,
                 'POST' => [
                     'controller' => $manufactureController,
                     'function' => 'editSubmit'],
                 'admin' => true,
             ],

             'edit_car' => [
                 'GET' => [
                     'controller' => $carController,
                     'function' => 'editForm'],

                 'POST' => [
                     'controller' => $carController,
                     'function' => 'editSubmit'],
                 'admin' => true,
             ],
             'edit_admin' => [
                 'GET' => [
                     'controller' => $adminController,
                     'function' => 'editForm'],
                // 'admin' => true,
                 'POST' => [
                     'controller' => $adminController,
                     'function' => 'editSubmit'],
                 'admin' => true,
             ],
             'cars' => [
                 'GET' => [
                     'controller' => $carController,
                     'function' => 'list'],
                  'admin' => true
             ],
             //manufacturers
             'display_image' => [
                 'GET' => [
                     'controller' => $carController,
                     'function' => 'showImage']

             ],
             'manufacturers' => [
                 'GET' => [
                     'controller' => $manufactureController,
                     'function' => 'list'],
                 'admin'=>true
             ],
             'message' => [
                 'GET' => [
                     'controller' => $contactController,
                     'function' => 'list'],
                     //'admin'=>true,
                 'POST' => [
                     'controller' => $contactController,
                     'function' => 'edit'],
                 'admin' => true,
             ],
             'contact' => [

                 'GET' => [
                     'controller' => $contactController,
                     'function' => 'edit']

             ],


             'staff' => [
                 'GET' => [
                     'controller' => $adminController,
                     'function' => 'list'],
                 'POST' => [
                     'controller' => $adminController,
                     'function' => 'list'],
                 'admin' => true
             ],


             'showcars' => [
                 'GET' => [
                     'controller' => $carController,
                     'function' => 'list_car'],
             ],
             'articles' => [
                 'GET' => [
                     'controller' => $articleController,
                     'function' => 'list'],
                 'admin' => true,

             ],

         ];
         return $routes;

     }
 }
 public function checklogin()
 {
         session_start();
     if (isset($_SESSION['admin']) && $_SESSION['admin']==true) {
        //if session is valid do nothing
     }
     else{//else go back to login
         header('location: /login');


     }

 }
}

