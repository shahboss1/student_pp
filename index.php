<?php
/*
    Jacob Landowski
    Shahbaz Iqbal
    1-30-18
*/
session_start();

require_once 'vendor/autoload.php';
require_once '../../../config.php';

//error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$f3 = Base::instance();

//f3 debug errors
$f3->set(DEBUG,3);

//connect to database
$dbh = conenct();

$f3->route('GET|POST /', function() {
    $template = new Template;
    echo $template->render('index.php');
});

$f3->route('GET|POST /new-pet', function($f3)
{
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $color = $_POST['pet-color'];
        $type  = $_POST['pet-type'];
        $name  = $_POST['pet-name'];

        include 'model/validate.php';

        $f3->set('success', $success);
        $f3->set('errors', $errors);
        $f3->set('color', $color);
        $f3->set('name', $name);
        $f3->set('type', $type);
    }a
        echo Template::instance()->render('views/new_pet_form.html');
    });

$f3->run();
