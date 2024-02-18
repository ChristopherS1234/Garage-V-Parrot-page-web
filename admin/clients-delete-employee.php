<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userID = validate($paraResult);

    $users = getById('client', $userID);
    if($users['status'] == 200){

        $userDeleteRes = deleteQuery ('client',$userID);
        if($userDeleteRes){

            redirect('clients-employee.php','Employé Supprimé');
        }else{
            redirect('clients-employee.php','Quelque chose ne va pas');
        }

    }else{
        redirect('clients-employee.php',$users['message']);
    }

}else{
    redirect('clients-employee.php', $paraResult);
}
?>