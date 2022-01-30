<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Posts\CreatePostRequest;
use App\Http\Requests\Panel\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role === 'author') {
            $postsQuery = Post::where('user_id', auth()->user()->id)->with('user');

            if ($request->search) {
                $postsQuery->where('title', 'LIKE', "%{$request->search}%");
            }

            $posts = $postsQuery->paginate();
        } else {
            $postsQuery = Post::with('user');

            if ($request->search) {
                $postsQuery->where('title', 'LIKE', "%{$request->search}%");
            }

            $posts = $postsQuery->paginate();
        }


        return view('panel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $categoryIds = Category::whereIn('name', $request->categories)->pluck('id')->toArray();

        if (count($categoryIds) < 1) {
            throw ValidationException::withMessages([
                'categories' => ['دسته بندی یافت نشد.']
            ]);
        }

        $file = $request->file('banner');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('images/banners', $fileName, 'public_files');

        $data = $request->validated();
        $data['banner'] = $fileName;
        $data['user_id'] = auth()->user()->id;

        $post = Post::create($data);
        $post->categories()->sync($categoryIds);

        session()->flash('status', 'مقاله به درستی ایجاد شد');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('panel.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $categoryIds = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();

        if (count($categoryIds) < 1) {
            throw ValidationException::withMessages([
                'categories' => ['دسته بندی یافت نشد.']
            ]);
        }

        $data = $request->validated();

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/banners', $file_name, 'public_files');

            $data['banner'] = $file_name;
        }


        $post->update($data);

        $post->categories()->sync($categoryIds);

        session()->flash('status', 'مقاله به درستی ویرایش شد.');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        session()->flash('status', 'مقاله به درستی حذف شد');
        return redirect()->route('posts.index');

    }
}
