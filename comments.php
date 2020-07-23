<?php
    $sqlSelect="SELECT id, author, text FROM comments WHERE post_id=? ORDER BY id DESC";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute([$index]);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>

<div>
    <?php if (count($comments) == 0) {
        echo 'Let your comment be the first!';
    } else { ?>
        <button class="btn btn-default" id="showHideBtn">Hide comments</button>
        
        <ul class="comments-container">
            <?php foreach ($comments as $comment) { ?>
                <li class="comment">
                    <hr class="comments-line-break">
                    <span><?php echo $comment['author']; ?></span> <br>
                    <p><?php echo $comment['text']; ?></p>

                    <?php include 'delete-comment.php'; ?>
                    

                </li>
            <?php } ?>
        </ul>
    <?php } ?>
    <br>
</div>

<script src="commentsButtons.js"></script>