<h1>Index</h1>
<?php
foreach ($data as $post) {
    echo "<a href='/postShow/" . $post->id . "'>" . $post->id . ', ' . $post->title . '</a>';
    echo '<p>' . substr($post->body, 0, 20) . ' . . . '  . '</p>';
    echo '<b>Date : ' . $post->created_at . '</b>';
}

?>