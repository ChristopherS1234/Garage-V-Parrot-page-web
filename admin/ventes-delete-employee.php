<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userID = validate($paraResult);

    $users = getById('ventes', $userID);
    if($users['status'] == 200){

        $userDeleteRes = deleteQuery ('ventes',$userID);
        if($userDeleteRes){

            redirect('vente-employee.php','Employé Supprimé');
        }else{
            redirect('vente-employee.php','Quelque chose ne va pas');
        }

    }else{
        redirect('vente-employee.php',$users['message']);
    }

}else{
    redirect('vente-employee.php', $paraResult);
}
?>