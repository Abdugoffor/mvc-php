<h1>Create</h1>

<form action="/store" method="post">
    <input type="text" placeholder="Title" value="<?= $data['title'] ?? '' ?>" name="title"><br>
    <span><?= $errors['title'] ?? '' ?></span><br>
    <br>

    <input type="text" placeholder="Body" value="<?= $data['body'] ?? '' ?>" name="body"><br>
    <span><?= $errors['body'] ?? '' ?></span><br>
    <br>

    <input type="submit" name="ok">
</form>