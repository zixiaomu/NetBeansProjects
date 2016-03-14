<!DOCTYPE html>

<!-- 


Student Info: Name=YUGENG CHANG, ID=9790

Subject: CS526(A)_HWNo_SPRING_2016

Author: yugengchang 

Filename: home.php 

Date and Time: Feb 24, 2016 11:22:37 PM 

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
        ?>
         <form action="index.php" method="post">            

       
		<table border="0" >
		<tr>
			<td>
			    Grade Book 
			</td>
            </tr>
            
            <td>
                Input Student INFO
            </td>
                        <tr><td><input type="submit" name="action" value="profile"></td><tr>


            <td>
                Input Sudent Scores
            </td>
                        <tr><td><input type="submit" name="action" value="scores"></td><tr>

            <td>
                Display Score Summary 

            </td>
                        <tr><td><input type="submit" name="action" value="summary"></td><tr>



		</tr>
                    <?php echo 'home', var_dump($profile) ?>
        <input type="hidden" name="lastname" value=" <?php echo $profile->last ?>" >
         <input type="hidden" name="firstname" value=" <?php echo$profile->first;  ?>" >
       <input type="text" name="title" value=" <?php echo  $profile->$title;  ?>" >
                                    <input type="text" name="data" value=" <?php echo$profile->$title->$data;  ?>" >



         </form>






		</table>        
    </body>
</html>
