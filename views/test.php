<h1>Test</h1>
<h2>
    <?php
    if (isset($data)) {
        echo $data;
    }
    ?>
</h2>
<form action="/create" method="post">
    <input type="text" value="Create" name="create">
    <input type="submit" name="ok">
</form>
<?php
if (isset($mevalar)) {

    foreach ($mevalar as $meva) {
        echo $meva . '<br>';
    }
}

?>