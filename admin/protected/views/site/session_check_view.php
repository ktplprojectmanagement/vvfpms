 <script type="text/javascript">
  var base_url = window.location.origin;
var timer = 0;
function set_interval() {

  timer = setInterval("auto_logout()", 60*60*1000);
}
function reset_interval() {
  if (timer != 0) { 
   clearInterval(timer);
   timer = 0;
   timer = setInterval("auto_logout()", 60*60*1000);
   //alert(timer);
  }
}
function auto_logout() {
   window.location.href=base_url+'/index.php?r=Login/employee_logout';
}  
 </script>

