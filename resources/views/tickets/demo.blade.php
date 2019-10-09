<form action="javascript:;" id="form_create">
	<button onclick="abc()"></button>
</form>
<script>
	function abc(){
	$.ajax({
	 type :"POST"
	 url  : "{{route('tickets.store')}}",
	 $data : $('#form_create').serialize(),
	 $datatype:"JSON",

	 success:function(response){

	 if(response.success=='status'){
	 alert(response.msg);
	 }

	 if(response.success=='status'){
	 alert(response.msg);
	 }
	 },
	 error:function(jqXHR,exception){
	 if (jqXHR.status==422){
	 var html_error='';
	 $.each(jqXHR.responseJSON.errors, function(key,value)
	 {
	 	html_error +='<div class="pgn push-on-sidebar-open pgn-simple"><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+value+'</div></div>';
	 });
	 $('.error_msg').html(html_error);
	 }
	 }
	});
}
</script>