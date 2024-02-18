<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userID = validate($paraResult);

    $users = getById('ventes', $userID);
    if($users['status'] == 200){

        $userDeleteRes = deleteQuery ('ventes',$userID);
        if($userDeleteRes){

            redirect('vente.php','Employé Supprimé');
        }else{
            redirect('vente.php','Quelque chose ne va pas');
        }

    }else{
        redirect('vente.php',$users['message']);
    }

}else{
    redirect('vente.php', $paraResult);
}
?>