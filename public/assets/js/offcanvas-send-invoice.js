document.addEventListener("DOMContentLoaded", function(e) {
    var t = document.querySelector("#invoice-message")
      , n = t.textContent.replace(/^\s+|\s+$/gm, "");
    t.value = n
});
