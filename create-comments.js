function validateCommentForm () {
    var author = document.forms["comment-form"]["author"].value;
    var comment = document.forms["comment-form"]["text"].value;
    var comment_alert = document.getElementById("comment-alert");
    var alert_on = false;

    if (author == "") {
        comment_alert.style.display = "";
        document.getElementById("authorErr").innerText = "*Name is required";
        alert_on = true;
    } else {
        document.getElementById("authorErr").innerText = "";
    }

    if (comment == "") {
        comment_alert.style.display = "";
        document.getElementById("commentErr").innerText = "*Comment content is required";
        alert_on = true;
    } else {
        document.getElementById("commentErr").innerText = "";
    }

    if (alert_on) {
        return false;
    } else {
        return true;
    }
}