/* app.js */
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
  document.getElementById("sidebar").style.width = "100%";
  document.getElementById("imagestyle").style.opacity = ".6";
  document.getElementById("menuBtn").style.display = "none";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  document.getElementById("imagestyle").style.opacity = "1";
  document.getElementById("menuBtn").style.display = "block";
}
/* end menuBtn code */