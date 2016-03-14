<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: profile.php 

Date and Time: Feb 25, 2016 7:15:58 PM 

Project Name: YUGENG_CHANG_9790_CS526_A__HW4 


--> 

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here\
        ?>
        <form action="index.php" method="post">

            <table border="0" >
                <tr>
                    <td>
                        <h1>Students INFO </h1>


                    </td>
                </tr>
                <tr>
                    <td>
                        Last Name<input size="50" type="text" name="lastname" value="<?php {
            echo $profile->last;
        } ?>" ></>	

                    </td>
                </tr>
                <tr>
                    <td>
                        First Name<input size="50" type="text" name="firstname" value="<?php {
            echo $profile->first;
        } ?>" ></>				

                    </td>
                </tr>
                <tr><td><input type="submit" name="action" value="save_info"></td></tr>

            </table>
        </form>            


    </body>
</html>
