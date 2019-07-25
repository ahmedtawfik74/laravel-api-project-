<?php
namespace App\Http\Controllers\Api;

use Validator;
trait ApiResponseTrait{

    public function apiResponse($data = null , $error = null , $code = 200){
        $array = [
            'data' => $data,
            'status' => in_array($code, $this->successCode())? true : false,
            'error' => $error
        ];
        return response($array , $code);
    }//end of api function

    public function successCode(){
        return [
            200 , 201 , 202
        ];
    }//end of code success function


    public function unknowError(){
        return $this->apiResponse(null,'Unknow Error',520);
    }//end of function return unknow error

    public function notFoundResponse(){
        return $this->apiResponse(null,'Not Found',404);
    }//end of function return notFoundResponse error

    public function deleteResponse(){
        return $this->apiResponse(true,null,200);
    }//end of function return deleteResponse error

    public function createdResponse($data){
        return $this->apiResponse($data,null,201);
    }//end of function return createdResponse error

    public function returnSuccessData($data){
        return $this->apiResponse($data);
    }//end of function return returnSuccessPost error

    public function apiValidation($request,$array){
        $validate=validator::make($request->all(),$array);
        if($validate->fails()){
            return $this->apiResponse(null, $validate->errors(),422);
        }
    }//end of apiVallidation function

}