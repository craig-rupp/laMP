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
                    // $user->password = "PAY";
                    // $user->first_name = "Alexisssss";
                    // $user->last_name = "SuperSanchez";

                    // $user->create();

                    // $delete = User::get_user_by_id(12);
                    // $delete->delete();
                    // $user = new User();
                    // $user = User::get_user_by_id(2); //static method call
                    // $user->last_name = "LewisN&News";

                    
                    // $user = User::get_user_by_id(3);
                    // $user->last_name = "Mucho Suave";
                    // $user->save();

                    // $anotherUser = new User();
                    // $anotherUser->username = "Mesut";
                    // $anotherUser->first_name = "Mesut";
                    // $anotherUser->last_name = "Ozil";
                    // $anotherUser->password = "Massitgician";
                    // $anotherUser->save();

                    // $deleteTest = User::get_user_by_id(11);
                    // $deleteTest->delete();

                    // $mesutUpdate = User::get_user_by_id(9);
                    // $mesutUpdate->username = "mesut_afc_11";
                    // $mesutUpdate->update();

                    // $newUser = new User();
                    // $newUser->first_name = "Jack";
                    // $newUser->last_name = "Wilshere";
                    // $newUser->username = "JWilsh";
                    // $newUser->password = "SherePowere";
                    // $newUser->save();

                    // $newUser = new User();
                    // $newUser->username = "Arsenal";
                    // $newUser->password = "FC49!";
                    // $newUser->first_name = "Gunners";
                    // $newUser ->last_name = "LONDON";
                    // $newUser->save();
                    $test = User::get_all_users();
                    foreach ($test as $user) {
                        echo $user->username;
                    }

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