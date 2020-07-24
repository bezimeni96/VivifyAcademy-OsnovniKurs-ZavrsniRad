var deletePostBtn = document.getElementById("deletePost");
deletePostBtn.addEventListener("click", confirmDeleting);

function confirmDeleting () {
    var r = confirm("Do you really want to delete this post?");
    if (r == true) {
        document.getElementById("confirmDelete").value = "true";
    }
}