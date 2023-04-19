$(document).ready(function () {
    setInterval(function(){f()},30000);
});
function f(){
    console.log("Reload");
    window.location.reload();
}
