<?php include 'header.php'; ?>

<div class="createPost">
    <div class="createPost-wrapper">
        <table class="createPost-table">
          <tr class="cratePost-table-headers">
            <th >Name</th>
            <th>Options</th>
          </tr>
          <tr>
            <td class="cratePost-table-postTitle">Post title</td>
            <td class="createPost-table-option">Edit - Delete</td>
          </tr>
          <tr>
            <td>Post title</td>
            <td>Edit - Delete</td>
          </tr>
        </table>
        <h2>Add new post</h2>
        <form action="posts.php" method="post">
            Post title
            <input type="text" name="postTitle" id="">
            Post content
            <textarea name="postContent" id="" cols="30" rows="10"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <?php include 'sidebar.php' ?>
</div>


<?php include 'footer.php'; ?>