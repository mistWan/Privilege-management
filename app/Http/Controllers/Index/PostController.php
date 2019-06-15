<?php

namespace App\Http\Controllers\Index;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class PostController
 * @package App\Http\Controllers\Index
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
        $items = $this->post->latest()->get();
        return view("index.post.index", compact("items"));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("index.post.create");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user_id = \Auth::id();
        $params = array_merge(compact("user_id"), $request->only(["title", "content"]));
        $store = $this->post->create($params);
        if ($store) {
            return redirect("/posts");
        }
        return redirect("posts/create");
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = $this->post->find($id);
        return view("index.post.show", compact("item"));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->post->find($id);
        return view("index.post.edit", compact("item"));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id)
    {
        $this->authorize("update", $this->post);
        $update = $this->post->where(compact("id"))->update($request->only(["title", "content"]));
        if ($update) {
            return redirect("/posts/{$id}");
        }
        return redirect("/posts/{$id}/edit");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $items = Post::search(\request("query"))->get();
        return view("index.post.search", compact("items"));
    }

}
