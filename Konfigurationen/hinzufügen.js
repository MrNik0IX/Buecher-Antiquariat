document.getElementById("hinzufuegen").addEventListener("click", function() {
  document.getElementById("box").style.display = "block";
  document.getElementById("box").style.zIndex = "9999";
  document.getElementById("hinzufuegen").getElementsByTagName("img")[0].src = "../Images/hinzufugen.png";
});

document.getElementById("hinzufuegen").addEventListener("mouseleave", function() {
  setTimeout(function() {
    if (!document.getElementById("box").matches(":hover")) {
      document.getElementById("box").style.display = "none";
      document.getElementById("hinzufuegen").getElementsByTagName("img")[0].src = "../Images/hinzufugen-leer.png";
    }
  }, 100);
});