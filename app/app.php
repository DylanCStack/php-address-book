<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;



    $app->get("/", function() use ($app) {

        $colSize = 12/count($_SESSION['list_of_contacts']);

        return $app['twig']->render('Contacts.html.twig', array('contacts' =>Contact::getAll(), 'colSize' => $colSize));
    });

    $app->post('/Create_contact', function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address1'], $_POST['address2'] );
        $contact->save();

        return $app['twig']->render('Create_contact.html.twig', array('contact' => $contact));
    });

    $app->post("/Delete_last", function() use ($app) {
        Contact::deleteLast();
        return $app->redirect('/');
    });

    $app->post('/Delete_contacts', function() use ($app) {
        Contact::deleteAll();

        return $app['twig']->render("Delete_contacts.html.twig");
    });

    return $app;
?>
