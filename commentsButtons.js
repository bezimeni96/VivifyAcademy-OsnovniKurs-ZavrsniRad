var btn = document.getElementById("showHideBtn");
btn.addEventListener("click", showHideComments)

function showHideComments () {
    var comments = document.querySelectorAll(".comment");

    if (btn.innerText == "Hide comments") {
        btn.innerText = "Show comments";
        comments.forEach(function (el) {
            el.style.display = "none";
        });
    } else {
        btn.innerText = "Hide comments";
        comments.forEach(function (el) {
            el.style.display = "";
        });
    }
}
