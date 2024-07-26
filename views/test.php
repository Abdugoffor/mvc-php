<h1>Test</h1>
<h2>
    <?php
    if (isset($data)) {
        // dd($data);
    }
    if (isset($errors) && !empty($errors)) {
        // dd($errors);
    }
    ?>
</h2>
<style>
    span {
        color: red;
        font-weight: 100;
        font-family: Arial;
        font-size: 12px;
    }
</style>
<form action="/createData" method="post">
    <input type="text" placeholder="Create" name="name"><br>
    <span><?= $errors['name'] ?? '' ?></span><br>
    <br>

    <input type="text" placeholder="Text" name="text"><br>
    <span><?= $errors['text'] ?? '' ?></span><br>
    <br>

    <input type="submit" name="ok">
</form>
<?php
// if (isset($mevalar)) {

//     foreach ($mevalar as $meva) {
//         echo $meva . '<br>';
//     }
// }

?>