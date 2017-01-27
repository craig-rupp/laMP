    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Blank Page
                    <small>Subheading</small>
                </h1>
                <?php 
                    include("user.php");
                    $allusers = User::get_all_users();
                    while($row = mysqli_fetch_array($allusers)){
                        //var_dump($row);
                        echo $row['username'] . "<br>";
                    }

                    $unique_user = User::get_user_by_id(2);
                    //var_dump($unique_user);
                    echo $unique_user['username'] . " was our " . $unique_user['id'] . "nd user!"
                   
                   
                    // $sql = "SELECT * FROM users WHERE id = 1";
                    // $result = $database->query($sql);
                    // $user_found = mysqli_fetch_array($result);
                    // print_r($user_found['username'] . "<br>");
                   


                 ?>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->