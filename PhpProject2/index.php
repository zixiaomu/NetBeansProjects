<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       $action = filter_input(INPUT_POST, 'action');


        if(empty($profile))
        {
                            $profile = new stdClass();

        }

        if (!empty(filter_input(INPUT_POST, 'lastname'))) {
            $lastname = filter_input(INPUT_POST, 'lastname');
            $profile->last = $lastname;
        }
        if (!empty(filter_input(INPUT_POST, 'firstname'))) {
            $firstname = filter_input(INPUT_POST, 'firstname');
            $profile->first = $firstname;
        }





        if (!empty($action)) {
            $action = filter_input(INPUT_POST, 'action');
        } else {
            $action = 'home';
            echo 'set';
        }

        switch ($action) {
            case 'home':

                            $profile = new stdClass();

                include_once "home.php";
                break;
            case 'profile':

                include_once "profile.php";

                break;
            case 'save_info':
                require_once "home.php";



                break;

            case 'scores':
                include_once "scores.php";


                break;
            case 'home_page':
                include_once "home.php";

                break;

            case 'summary':


                include_once 'summary.php';
                break;
            case 'save_scores':

                var_dump($profile);

                $data = filter_input(INPUT_POST, 'data');
                $title = filter_input(INPUT_POST, 'title');
                echo 'data', $data;
                echo 'title', $title;



                if (!empty($profile->$title)) {
                    echo 'in';
                    array_push($profile->$title->scores, $data);
                } else {
                    echo 'not';
                    $profile->$title = new stdClass();
                    $profile->$title->scores = array($data);
                }
                include 'scores.php';


                break;
        }











        // include_once "scores.php";
        // include_once "summary.php";
        ?>
    </body>
</html>
