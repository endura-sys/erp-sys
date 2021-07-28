<script type="text/javascript">
function recp(id) {
  $('#myStyle').load('data.php?id=' + id);
}
</script>

<a href="#" onClick="recp('1')" > One   </a>
<a href="#" onClick="recp('2')" > Two   </a>
<a href="#" onClick="recp('3')" > Three </a>

<div id='myStyle'>
</div>
