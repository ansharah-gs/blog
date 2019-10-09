<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
<script>
    function (){
        $.ajax
    }
    {
  "draw": 3,
  "recordsTotal": 57,
  "recordsFiltered": 57,
  "data": [
    {
      "first_name": "Charde",
      "last_name": "Marshall",
      "position": "Regional Director",
      "office": "San Francisco",
      "start_date": "16th Oct 08",
      "salary": "$470,600"
    },
    {
      "first_name": "Colleen",
      "last_name": "Hurst",
      "position": "Javascript Developer",
      "office": "San Francisco",
      "start_date": "15th Sep 09",
      "salary": "$205,500"
    },
    {
      "first_name": "Dai",
      "last_name": "Rios",
      "position": "Personnel Lead",
      "office": "Edinburgh",
      "start_date": "26th Sep 12",
      "salary": "$217,500"
    },
    {
      "first_name": "Donna",
      "last_name": "Snider",
      "position": "Customer Support",
      "office": "New York",
      "start_date": "25th Jan 11",
      "salary": "$112,000"
    },
    {
      "first_name": "Doris",
      "last_name": "Wilder",
      "position": "Sales Assistant",
      "office": "Sidney",
      "start_date": "20th Sep 10",
      "salary": "$85,600"
    },
    {
      "first_name": "Finn",
      "last_name": "Camacho",
      "position": "Support Engineer",
      "office": "San Francisco",
      "start_date": "7th Jul 09",
      "salary": "$87,500"
    },
    {
      "first_name": "Fiona",
      "last_name": "Green",
      "position": "Chief Operating Officer (COO)",
      "office": "San Francisco",
      "start_date": "11th Mar 10",
      "salary": "$850,000"
    },
    {
      "first_name": "Garrett",
      "last_name": "Winters",
      "position": "Accountant",
      "office": "Tokyo",
      "start_date": "25th Jul 11",
      "salary": "$170,750"
    },
    {
      "first_name": "Gavin",
      "last_name": "Joyce",
      "position": "Developer",
      "office": "Edinburgh",
      "start_date": "22nd Dec 10",
      "salary": "$92,575"
    },
    {
      "first_name": "Gavin",
      "last_name": "Cortez",
      "position": "Team Leader",
      "office": "San Francisco",
      "start_date": "26th Oct 08",
      "salary": "$235,500"
    }
  ]
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/objects.php",
        "columns": [
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    } );
} );
</script>
<?php
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'datatables_demo';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
    array( 'db' => 'first_name', 'dt' => 'first_name' ),
    array( 'db' => 'last_name',  'dt' => 'last_name' ),
    array( 'db' => 'position',   'dt' => 'position' ),
    array( 'db' => 'office',     'dt' => 'office' ),
    array(
        'db'        => 'start_date',
        'dt'        => 'start_date',
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'salary',
        'dt'        => 'salary',
        'formatter' => function( $d, $row ) {
            return '$'.number_format($d);
        }
    )
);
 
// SQL server connection information
$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => ''
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>