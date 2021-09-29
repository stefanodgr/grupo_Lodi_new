<?php
include("../../../../Funciones/BD.php");

$tipo_peticion = $_SERVER["REQUEST_METHOD"];

if($tipo_peticion == "GET"){
    header("Content-type:application/json",TRUE,200);    
    $array_response = [
        "codigo"=>200,
        "mensaje"=>"Se retornan los valores correspondientes",
        "data_response" => [
            [
                "id"=>1, 
                "nombre" => "tefo Systems",
                "descripcion" => "Casa se software" ,
                "status"=> 1
            ],
            [
                "id"=>2, 
                "nombre" => "Mima Systems",
                "descripcion" => "Casa se software" ,
                "status"=> 1
            ],
    
        ]
    ];
    echo json_encode($array_response);
}elseif ($tipo_peticion == "POST") {
    header("Content-type:application/json",TRUE,405);    
    $array_response = [
        "codigo"=>405,
        "mensaje"=>"METODO DE ACCESO NO PERMITIDO",
        "data_response" => [
        ]
    ];
    echo json_encode($array_response);
}