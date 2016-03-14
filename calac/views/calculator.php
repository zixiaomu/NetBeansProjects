

<h1>calculator</h1>
<div id="main">
    <form action="?controller=basic" method="post">


        <label>X:</label>
        <input type=text" name="x" value="<?php echo $x; ?>" /> 
        <br />
        <label>Y:</label>
        <input type=text" name="y" value="<?php echo $y; ?>"/> 
        <br />
        <input type="submit" name="action" value="Add" />
        <input type="submit" name="action" value="Subtract" />

        <br/>

    </form>
    <hr>
    <?php echo $result; ?>
</div>