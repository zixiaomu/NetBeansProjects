<h1>Basic Calculator</h1>
<div id="main">
    <form action="?controller=basic" method="post">
        <label>Enter capitals of the Below State :</label>
    <p ><?php  echo $key?></p>

        <input type=text" name="enter" value="<?php echo $enter; ?>"/> 
        <br />
        
        <br />
                <input type="hidden" value="<?php echo $key ?>" name="key" >
                        <input type="hidden" value="<?php echo $index?>" name="index" >

        <input type="hidden" value="<?php echo $pass ?>" name="pass" >
        <input type="submit" value="pr" name="action" /> 
        <input type="submit" value="next" name="action" /> 
        <br />
    </form>
    <hr>
   
</div>