<?php
session_start();
error_reporting(0);
$user = $_SESSION['username'];


/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'bill_invoice';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    // array('db' => 'id', 'dt' => 0),
    array('db' => 'start_date_bo',  'dt' => 0),
    array('db' => 'name_company_cus',   'dt' => 1),
    array('db' => 'end_date_bo',     'dt' => 2),
    array('db' => 'read_date_cus',     'dt' => 3),
    array('db' => 'status_docs',     'dt' => 4),
    array(
        'db'        => 'id',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
            return '    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $d . '"><i class="fas fa-search"></i> Preview</button> <button onclick="Delete_rows(' . $d . ')" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  Delete</button>';
            // Edit return '<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$d.'">Edit</button>  <button onclick="Delete_rows(' . $d . ')" class="btn btn-sm btn-danger">Delete</button>';
        }
    ),
    // array(
    //     'db'        => 'start_date',
    //     'dt'        => 4,
    //     'formatter' => function( $d, $row ) {
    //         return date( 'jS M y', strtotime($d));
    //     }
    // ),
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '@Newayw123',
    'db'   => 'bill_format',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

 

require('DataTables/examples/server_side/scripts/ssp.class.php');
// echo $user;
$where = "session_user = '$user'";
// echo $where;

echo json_encode(
    // SSP::simpleCustom($_GET, $sql_details, $table, $primaryKey, $columns,$where)
    SSP::simpleCustom_bo( $_GET, $sql_details, $table, $primaryKey, $columns, $where)

);
