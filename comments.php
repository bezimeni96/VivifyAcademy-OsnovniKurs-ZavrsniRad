<?php
    $sqlSelect="SELECT author, text FROM comments WHERE post_id=$index ORDER BY id DESC";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>

<div>
    <ul class="comments">
        <?php foreach ($comments as $comment) { ?>
            <hr>
            <li class="comment">
                <span><?php echo $comment['author']; ?></span>
                <span><?php echo $comment['text']; ?></span>
            </li>
        <?php } ?>
    </ul>
</div>