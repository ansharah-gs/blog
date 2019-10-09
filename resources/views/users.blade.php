<!DOCTYPE html>

<html lang="en">
<head>
<title>Laravel DataTable</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="{{ asset('js/handlebars-v4.3.1.js') }}"></script>
<style type="text/css">
  td.details-control {
    background: url({{ asset('images/details_open.png') }}) no-repeat center center;
    cursor: pointer;
    width: 18px;
}
tr.shown td.details-control {
    background: url({{ asset('images/details_close.png') }}) no-repeat center center;
}
</style>
</head>
      <body>
         <div class="container">
               <h2>Laravel DataTable </h2>
            <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                    <th>#</th>
                     <th>Id</th>
                     <th>Title</th>
                     <th>Body</th>
                     <th>Created at</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
   $(document).ready( function () {
     var template = Handlebars.compile($("#details-template").html());
    var table=$('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('users-list') }}",
           columns: [
                    { "className":      'details-control',
                    data:null,
                  "orderable":      false,
                "searchable":     false,
               "defaultContent": ''},
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'body', name: 'body' },
                    { data: 'created_at', name: 'created_at' }
                 ]
        });
    // Add event listener for opening and closing details
    $('#laravel_datatable tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });
     });
  </script>
  <script id="details-template" type="text/x-handlebars-template">
    <table class="table">
      <thead>
                  <tr>
                     <th> Task Id</th>
                     <th>Description</th>
                     
                  </tr>
               </thead>
               <tbody>
       @{{#each tasks}}
        <tr>
          <td>@{{id}}</td>
        <td>@{{description}}</td>
        </tr>
       @{{/each}}
     </tbody>
    </table>
</script>
   </body>