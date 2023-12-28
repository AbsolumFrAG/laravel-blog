<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin.categories.show', compact('category'));
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
