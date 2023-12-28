<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.tag.index', compact('tags'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }

    public function delete(Tag $tag): RedirectResponse
    {
        try {
            $tag->delete();
        } catch (Exception $exception) {
            \Session::flash('success', $exception->getMessage());
        }

        return redirect()->route('admin.tag.index');
    }
}
