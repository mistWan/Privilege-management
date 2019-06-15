<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller
{

    /**
     * @var Post
     */
    protected $post;

    /**
     * PostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->post->withoutGlobalScope("status")->where("status", 0)->latest()->paginate(10);
        return view("admin.post.index", compact("items"));
    }

    /**
     * @param $id
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, $status)
    {
        $update = $this->post->where(compact("id"))->update(compact("status"));
        if ($update) {
            return response()->json(["code" => 200]);
        }
        return response()->json(["code" => 20001]);
    }
}
