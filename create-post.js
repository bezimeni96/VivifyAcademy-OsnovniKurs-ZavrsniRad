function validatePostForm () {
    var title = document.forms["post-form"]["title"].value;
    var body = document.forms["post-form"]["body"].value;
    var post_alert = document.getElementById("post-alert");
    var alert_on = false;

    if (title == "") {
        post_alert.style.display = "";
        document.getElementById("titleErr").innerText = "*Your post title is empty";
        alert_on = true;
    } else {
        document.getElementById("titleErr").innerText = "";
    }

    if (body == "") {
        post_alert.style.display = "";
        document.getElementById("bodyErr").innerText = "*Post content is empty";
        alert_on = true;
    } else {
        document.getElementById("bodyErr").innerText = "";
    }

    if (alert_on) {
        return false;
    } else {
        return true;
    }
}