<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class postsController extends Controller {
	use ApiResponseTrait;

	public function index() {
		$posts = PostResource::collection(Post::paginate(10));
		return $this->apiResponse($posts);
	} //end of index

	public function show($id) {
		$post = Post::find($id);
		if ($post) {
            return $this->apiResponse(new PostResource($post));
		}
		return $this->notFoundResponse();
	} //end of show one

	public function store(Request $request) {
		$validation = $this->validation($request);
		if ($validation instanceof Response) {
			return $validation;
		}
		$post = Post::create($request->all());
		if ($post) {
			return $this->createdResponse(new PostResource($post));
		}
		return $this->unknowError();
	} //end of show one

	public function update(Request $request, $id) {
		$validation = $this->validation($request);
		if ($validation instanceof Response) {
			return $validation;
		}
		$post = Post::find($id);
		if (!$post) {
			return $this->notFoundResponse();
		}
		$post->update($request->all());
		if ($post) {
            return $this->returnSuccessData(new PostResource($post));
		}
		return $this->unknowError();
	} //end of update api function
	public function delete($id) {
		$post = Post::find($id);
		if ($post) {
			$post->delete();
			return $this->deleteResponse();
		}
		return $this->notFoundResponse();
	} //end of delete api function
	public function validation($request) {
		return $this->apiValidation($request, [
			'title' => 'required',
			'body' => 'required',
		]);
	}
}
