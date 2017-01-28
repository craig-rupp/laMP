    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Blank Page
                    <small>Subheading</small>
                </h1>
                <?php 
                    //include("user.php");functions autoload should hope fully catch this class
                    $allusers = User::get_all_users();

                    foreach($allusers as $user){
                        //var_dump($user);
                        echo $user->username . "<br>";
                    }
                    $found_user = User::get_user_by_id(2);
                    echo $found_user->username . "<br>";
                    echo $found_user->password . "<br>";
                    

                    // $user = User::attribute($found_user);
                    // echo $user->username;
                    // var_dump($allusers);
                    // foreach($allusers as $user) {
                    //     //var_dump($user);
                    // }
                    // while($row = mysqli_fetch_array($allusers)){
                    //     //var_dump($row);
                    //     echo $row['username'] . "<br>";
                    // }

                    // $unique_user = User::get_user_by_id(2);
                    // $this_user = User::attribute($unique_user);
                    // $user_attributes = new User();
                    // $user_attributes->username = $unique_user['username'];
                    // $user_attributes->password = $unique_user['password'];
                    // $user_attributes->id = $unique_user['id'];
                    // $user_attributes->first_name = $unique_user['first_name'];
                    // $user_attributes->last_name = $unique_user['last_name'];

                    // echo $user_attributes->username . " was our " . $user_attributes->id . "nd user";
                    
                   
                   
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