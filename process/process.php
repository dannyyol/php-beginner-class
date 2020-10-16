<?php 

require_once('database.php');


class ProcessData{
    function createRecord($database){
        if(isset($_POST) & !empty($_POST)){
            $fname = $database->sanitize($_POST['fname']);
            $lname = $database->sanitize($_POST['lname']);
            $email = $database->sanitize($_POST['email']);
            $gender = $_POST['gender'];
            $age = $_POST['age'];
       
            $res = $database->create($fname, $lname, $email, $gender, $age);
            if($res){
                echo '
                <br><br><br>
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            Successfully inserted data
                        </div>
                    </div>
                
                ';
            }else{
                echo '
                <br><br><br>
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            Failed to inserted data
                        </div>
                    </div>
                ';
            }
       }
    }

    public function updateStudent($database){
        if(isset($_POST) & !empty($_POST)){
            $id = $_GET['id'];

            $fname = $database->sanitize($_POST['fname']);
            $lname = $database->sanitize($_POST['lname']);
            $email = $database->sanitize($_POST['email']);
            $gender = $_POST['gender'];
            $age = $_POST['age'];
       
           $res = $database->update($fname, $lname, $email, $gender, $age, $id);
               if($res){
                   echo '
                   <br><br><br>
                       <div class="container">
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   <span class="sr-only">Close</span>
                               </button>
                               Successfully updated data
                           </div>
                       </div>
                   
                   ';
               }else{
                   echo '
                   <br><br><br>
                       <div class="container">
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   <span class="sr-only">Close</span>
                               </button>
                               Failed to update data
                           </div>
                       </div>
                   ';
               }
       
           }
    }

    public function deleteRecord($database){
        $id = $_GET['id'];
 
        $res = $database->delete($id);
        if($res){
            header('location: index.php');
            
        }
    }



    function register($database){
        if(isset($_POST) & !empty($_POST)){
            $email = $database->sanitize($_POST['email']);
            $password = $database->sanitize($_POST['password']);
            $password = md5($password);

            // var_dump ($email . '-' . $password);
       
            $res = $database->register($email, $password);
            if($res){
                // header('location:index.php');
            }
        }
    }

    function login($database){
        if(isset( $_POST['submit'])){
            $email = $database->sanitize($_POST['email']);
            $password = $database->sanitize($_POST['password']);
            $password = md5($password);

            // echo $email . ' - ' . $password;
       
            $result = $database->login($email, $password);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $db_email = $row["email"];
                    $db_role = $row["role"];

                    $db_password = $row["passwd"];

                    $_SESSION['role'] = $db_role;
                    $_SESSION['email'] = $db_email;

                    $session_array[1] = $_SESSION['email'];
                    $session_array[2] = $_SESSION['role'];

                    echo $_SESSION['email'];

                    if(($email == $db_email) && ($password == $db_password)){
                        header('location:index.php');
                    }
                }
            }
            // return $session_array;
        }
        

        if(isset($_SESSION['role']) && isset($_SESSION['email'])){
            $session_array[1] = $_SESSION['email'];
            $session_array[2] = $_SESSION['role'];

            return $session_array;
        }


    }

    public function updateUser($database){
        $id = $_GET['id'];
        $res = $database->readUsers($id);
        $read = mysqli_fetch_assoc($res);
        if(isset($_POST) & !empty($_POST)){
            $email = $database->sanitize($_POST['email']);
            $password= $database->sanitize($_POST['password']);
            $role = $database->sanitize($_POST['role']);
        
            $res = $database->updateUser($role,$password,$email, $id);
                if($res){
                    echo '
                    <br><br><br>
                        <div class="container">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Successfully updated data
                            </div>
                        </div>
                    
                    ';
                }else{
                    echo '
                    <br><br><br>
                        <div class="container">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Failed to update data
                            </div>
                        </div>
                    ';
                }
                return $res;
        
            }
    }

}


?>