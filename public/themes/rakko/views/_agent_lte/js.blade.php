<script>


function myFunction() {

document.getElementById("count").innerHTML = "0";

}


$(document).ready(function () {

$('.noti_User').click(function () {
var id = this.id;
var dataString = 'id=' + id;
$.ajax
({
type: "POST",
url: "{{url('mark-read')}}" + "/" + id,
data: dataString,
cache: false,
success: function (html)
{
//$(".city").html(html);
}
});
});

});


$(function() {
// Enable iCheck plugin for checkboxes
// iCheck for checkbox and radio inputs
// $('input[type="checkbox"]').iCheck({
// checkboxClass: 'icheckbox_flat-blue',
// radioClass: 'iradio_flat-blue'
// });
// Enable check and uncheck all functionality
$(".checkbox-toggle").click(function() {
var clicks = $(this).data('clicks');
if (clicks) {
//Uncheck all checkboxes
$("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
} else {
//Check all checkboxes
$("input[type='checkbox']", ".mailbox-messages").iCheck("check");
}
$(this).data("clicks", !clicks);
});

//Handle starring for glyphicon and font awesome
$(".mailbox-star").click(function(e) {
e.preventDefault();
//detect type
var $this = $(this).find("a > i");
var glyph = $this.hasClass("glyphicon");
var fa = $this.hasClass("fa");
//Switch states
if (glyph) {
$this.toggleClass("glyphicon-star");
$this.toggleClass("glyphicon-star-empty");
}
if (fa) {
$this.toggleClass("fa-star");
$this.toggleClass("fa-star-o");
}
});
});


$.ajaxSetup({
headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


</script>
