<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Services\Interfaces\PostServiceInterface as PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $postService;
    protected $postRepository;


    public function __construct(
        PostService $postService,
        PostRepository $postRepository

    ) {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'post.index');
        $config['model'] = 'Post';
        $config['seo'] = config('apps.messages.post');
        $posts = $this->postService->paginate($request);
        return view('backend.post.index', compact('config', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('modules', 'post.create');
        $config['model'] = 'Post';
        $config['seo'] = config('apps.messages.post');
        return view('backend.post.create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->postService->create($request)) {
            return redirect()->route('post.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('post.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('modules', 'post.edit');
        $config['model'] = 'Post';
        $config['seo'] = config('apps.messages.post');
        $post = $this->postRepository->findById($id);
        
        return view('backend.post.edit', compact('post', 'config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($this->postService->update($id, $request)) {
            return redirect()->route('post.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('post.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $this->authorize('modules', 'post.delete');
        $config['seo'] = config('apps.messages.post');
        $post = $this->postRepository->findById($id);
        return view('backend.post.delete', compact('post', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->postService->destroy($id)) {
            return redirect()->route('post.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('post.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
