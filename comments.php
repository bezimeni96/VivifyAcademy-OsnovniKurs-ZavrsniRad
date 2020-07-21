<?php

    $sqlSelect="SELECT author, text FROM comments WHERE post_id=$index ORDER BY id DESC";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();

    
?>

<div>
    <?php if (count($comments) == 0) {
        echo 'budi prvi koji ce komentarisati';
    } else { ?>
        <button class="btn btn-default" id="showHideBtn">Hide comments</button>
        <ul class="comments-container">
            <?php foreach ($comments as $comment) { ?>
                <li class="comment">
                    <hr class="comments-line-break">
                    <span><?php echo $comment['author']; ?></span>
                    <p><?php echo $comment['text']; ?></p>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>

<script src="commentsButtons.js"></script>