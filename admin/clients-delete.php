<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userID = validate($paraResult);

    $users = getById('client', $userID);
    if($users['status'] == 200){

        $userDeleteRes = deleteQuery ('client',$userID);
        if($userDeleteRes){

            redirect('clients.php','Employé Supprimé');
        }else{
            redirect('clients.php','Quelque chose ne va pas');
        }

    }else{
        redirect('clients.php',$users['message']);
    }

}else{
    redirect('clients.php', $paraResult);
}
?>