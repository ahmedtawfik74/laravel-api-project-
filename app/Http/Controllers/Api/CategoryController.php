<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $posts=CategoryResource::collection(Category::paginate(10));
        return $this->apiResponse($posts);
    }
    public function show($id){
        $category=Category::find($id);
        if($category){
            return $this->returnSuccessData(new CategoryResource($category));
        }
        return $this->notFoundResponse();
    }

    public function store(Request $request){
        $validation=$this->validation($request);
        if($validation instanceof Response){
            return $validation;
        }
        $category=Category::create($request->all());
        if($category){
            return $this->createdResponse(new CategoryResource($category));
        }
        return $this->notFoundResponse();
    }
    public function update(Request $request,$id){
        $validation=$this->validation($request);
        if($validation instanceof Response){
            return $validation;
        }
        $category=Category::find($id);
        if (!$category) {
            return $this->notFoundResponse();
        }
        $category->update($request->all());
        if($category){
            return $this->returnSuccessData(new CategoryResource($category));
        }
        return $this->unknowError();
    }
    public function delete($id){
        $category=Category::find($id);
        if($category){
            $category->delete();
            return $this->deleteResponse();
        }
        return $this->notFoundResponse();
    }
    public function validation($request){
        return $this->apiValidation($request,[
           'name'=>'required|min:3'
        ]);
    }
}
