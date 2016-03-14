<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: scores.php 

Date and Time: Feb 25, 2016 7:16:07 PM 

Project Name: YUGENG_CHANG_9790_CS526_A__HW4 


--> 

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
                var_dump($profile);

        
        ?>
        <form action="index.php" method="post">

            <table border="0" >
                <tr>
                    <td>
                        <h1>Students Scores </h1>


                    </td>
                </tr>
                <tr>
                    <td>
                        corse title<input size="50" type="text" name="title" value="<?php echo $title ?>" ></>	

                    </td>
                </tr>
                <tr>
                    <td>
                        scores<input size="50" type="text" name="data" value="" ></>				

                    </td>
                </tr>
                <tr><td><input type="submit" name="action" value="home_page"></td><td>
                        <input type="submit" name="action" value="save_scores"></td>
                              <input type="hidden" name="lastname" value=" <?php echo $profile->last ?>" >
         <input type="hidden" name="firstname" value=" <?php echo$profile->first;  ?>" >
                 <!-- <input type="text" name="title" value=" <?php echo  json_encode($profile->$title);  ?>" >
                                    <input type="text" name="data" value=" <?php echo$profile->$title->$data;  ?>" >


-->

                </tr>

            </table>
        </form>    
    </body>
</html>
