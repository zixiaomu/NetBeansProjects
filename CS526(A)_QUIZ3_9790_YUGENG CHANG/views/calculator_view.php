<h1>Basic Calculator</h1>
<div id="main">
    <form action="?controller=basic" method="post">
        <label>Enter capitals of the Below State :</label>
    <p class='Calculator'><?php  echo $key?></p>

        <input type=text" name="enter" value="<?php echo $enter; ?>"/> 
        <br />
        
        <br />
        <input type="submit" value="next" name="action" /> 
        <input type="submit" value="ok" name="action" /> 
        <br />
    </form>
    <hr>
    <?php echo $result; ?>
</div>