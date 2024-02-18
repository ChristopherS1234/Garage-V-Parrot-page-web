<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userID = validate($paraResult);

    $users = getById('employee', $userID);
    if($users['status'] == 200){

        $userDeleteRes = deleteQuery ('employee',$userID);
        if($userDeleteRes){

            redirect('users.php','Employé Supprimé');
        }else{
            redirect('users.php','Quelque chose ne va pas');
        }

    }else{
        redirect('users.php',$users['message']);
    }

}else{
    redirect('users.php', $paraResult);
}
?>