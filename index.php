

<html>
  <head>
    <title>ALB - Database & Services</title>

    <!-- BEGIN : a little CSS -->
    <style>
      html{
        text-align:center;
        background-color:#3b73b9;
      }
      body {
        background-color:#fff;
        width:80%;
        margin-left:auto;
        margin-right:auto;
        border-radius:5px;
      }
        <!-- END : a little CSS -->
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
  </head>

  <body>
    <h1>ALB - Database & Services</h1>
    <p>This page uses PHP to make a PostgreSQL database connection</p>

    <!-- BEGIN : some PHP to demonstrate server side language installation, and DB connection -->
    <?php
      //display a message
      print "<h4 style='color:#00FF00;'>If you can see this, then PHP has been installed on the server.</h4>";

      //BEGIN : set credentials for our database
      $host = '';
      $port='5432'; //this is the default port for PostgreSQL databases
      $dbname='';
      $user = '';
      $pw='';

      //END : set credentials for our database
      //BEGIN : attempt to establish a database connection
      print "Database connection status:";
      $pg_conn = pg_pconnect("host=$host port=$port dbname=$dbname user=$user password=$pw");
      if (!$pg_conn) {
        //IF connection not made
        echo "<h4 style='color:#FF0000;'>Connection not made.</h4>";
      } else {
        //ELSE connection was made
        echo "<h4 style='color:#00FF00;'>Connection made.</h4>";
        //query database
        /**Use php PostgreSQL funtions documentation at http://php.net/manual/en/ref.pgsql.php to
           write if/else statement to test whether query was successful and display "Query Successful" or
           "Query Unsuccessful" on the webpage
        **/
        
        /**In Successful query display results in a html table format.
           table elements include the following attributes:
           id="example" class="display" cellspacing="0" width="100%"
        **/

      }
      //END : attempt to establish a database connection
      ?>
    <!-- END   : some PHP to demonstrate server side language installation, and DB connection -->
  </body>
</html>
