    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Blank Page
                    <small>Subheading</small>
                </h1>
                <?php 
                    //had includes now use require_once with functions autoloaderxx
                    // $allusers = User::get_all_users();

                    // foreach($allusers as $user){
                    //     //var_dump($user);
                    //     echo $user->username . "<br>";
                    // }
                    // $found_user = User::get_user_by_id(2);
                    // echo $found_user->username . "<br>";
                    // echo $found_user->password . "<br>";

                    // $user = new User();
                    // $user->username = "Alexis7";
                    // $user->password = "SanchezBaby";
                    // $user->first_name = "Alexis";
                    // $user->last_name = "Sanchez";

                    // $user->create();
                    // $user = new User();
                    // $user = User::get_user_by_id(2); //static method call
                    // $user->last_name = "LewisN&News";

                    // $user->update();
                    $user = User::get_user_by_id(6);
                    $user->delete();


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