@extends('layouts.app')
@section('title','Create Ticket')
@section('content')
<div class="container">
    <h2>
        Get Your Ticket
    </h2>
    <form accept-charset="UTF-8" action="javascript:;" id="form_create">
        @csrf
        <div class="form-group">
            <label for="name">
                Name:
            </label>
            <input class="form-control" name="name" placeholder="Enter Your Name" type="name">
            </input>
        </div>
        <button class="btn btn-primary" onclick="abc()" type="submit">
            Get Ticket
        </button>
        <span class="error_msg">
        </span>
    </form>
</div>
@endsection
@section('script')
<script>
    function abc(){
          $.ajax({
        type: "POST",
        url: "{{route('tickets.store')}}",
        data: $('#form_create').serialize(),
        dataType: "JSON",
        success: function (response) {
        if(response.status == 'success')
        {
          alert(response.msg);

        }

        if(response.status == 'failure')
        {
          alert(response.msg);

        }
        },
        error: function(jqXHR, exception){
        if (jqXHR.status == 422) {
        var html_error = '';
        $.each(jqXHR.responseJSON.errors, function (key, value)
        {
        html_error +='<div class="pgn push-on-sidebar-open pgn-simple"><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+value+'</div></div>';
        });
        $('.error_msg').html(html_error);

        }
        }
        });
  }
</script>
@endsection
