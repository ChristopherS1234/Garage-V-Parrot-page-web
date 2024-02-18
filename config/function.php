<?php

require 'dbcon.php';

function validate($inputData)
{

    global $conn;

    $validateData = mysqli_real_escape_string($conn, $inputData);
    return trim($validateData);
}

function redirect($url, $status)
{

    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

function webSetting($columName){
    $setting = getById('settings', 1);
    if($setting['status'] == 200){
       return $setting['data'][$columName];
    }
}

function alertMessage()
{
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-succes">
        <h4>' .$_SESSION['status']. '</h4>
        </div>';
        unset($_SESSION['status']);
    }
}

function checkParamId($paramType)
{

    if (isset($_GET[$paramType])) {
        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return 'Id introuvable';
        }
    } else {
        return 'Aucun id donné';
    }
}

function getAll($tableName)
{

    global $conn;

    $tableName = validate($tableName);

    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getById($tableName, $id)
{

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message data' => 'Fetech data',
                'data' => $row

            ];
            return $response;
        } else {
            $response = [
                'status' => 404,
                'message data' => 'No Data Record',

            ];
            return $response;
        }
    } else {
        $reponse = [
            'status' => 500,
            'message data' => 'Something Went Wrong',
        ];
        return $reponse;
    }
}

function deleteQuery($tableName, $id)
{

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id'LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}
