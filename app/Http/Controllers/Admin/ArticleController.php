<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Artikel',
        ];
        if ($request->ajax()) {
            $data = Article::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'thumbnail',
                    function ($row) {
                        return $row->thumbnail != "" && Storage::exists('public/article/' . $row->thumbnail) ? '<a href="' . Storage::url('public/article/' . $row->thumbnail) . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . Storage::url('public/article/' . $row->thumbnail) . '"></a>' : (Str::contains($row->thumbnail, 'https://') ? '<a href="' . $row->thumbnail . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . $row->thumbnail . '"></a>' : 'Thumbnail tidak ditemukan');
                        // return $row->thumbnail != "" && Storage::exists('public/article/' . $row->thumbnail) ? '<a href="' . Storage::url('public/article/' . $row->thumbnail) . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . Storage::url('public/article/' . $row->thumbnail) . '"></a>' : 'Thumbnail tidak ditemukan';
                    }
                )
                ->editColumn(
                    'created_at',
                    function ($row) {
                        return $row->created_at->format('d M Y');
                    }
                )
                ->editColumn(
                    'category',
                    function ($row) {
                        return $row->category->name;
                    }
                )
                ->addColumn('action', function ($row) {

                    $btn = '<div class="dropdown">
                                <a href="" class="btn btn-secondary btn-icon rounded-circle mg-r-5" data-toggle="dropdown">
                                    <div class="d-flex align-items-center justify-content-center">
                                    <i class="fa fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu pd-10 wd-200">
                                    <nav class="nav nav-style-1 flex-column">
                                    <a href="javascript:void(0)" type="button" onclick="destroy(' . $row->id . ')" class="nav-link"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="' . route("admin.article.edit", $row->slug) . '" class="nav-link"><i class="fa fa-pencil"></i> Edit</a>
                                    <a target="_blank" href="' . route('article.read', $row->slug) . '" class="nav-link"><i class="fa fa-eye"></i> Lihat</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['thumbnail', 'created_at', 'category', 'action'])
                ->make(true);
        }
        return view('admin.pages.article.index', $data);
    }


    public function create()
    {
        $data = [
            'title'  => 'Tambah Artikel',
        ];
        return view('admin.pages.article.form', $data);
    }

    public function edit(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->with('tags:slug,name')->firstOrFail();
        $addArr = Arr::add($article, 'file_exists', Storage::exists('public/article/' . $article->thumbnail));
        $data = [
            'title'  => 'Edit Artikel',
        ];
        if ($request->ajax()) {
            return response()->json($addArr);
        }
        // dd($article2);
        return view('admin.pages.article.form', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'slug' =>  empty($request->id) ? 'required|max:255|unique:articles,slug' : 'required|max:255|unique:articles,slug,' . $request->id,
            'thumbnail' => 'image|mimes:jpeg,jpg,png,gif|max:5048|nullable',
            'content' => 'required',
            'category' => 'required',
            'tag' => 'max:500|nullable',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            // tags

            if (!empty($request->tag) || $request->tag != '') {
                $tags = explode(',', $request->tag);
                $tagIds = [];
                foreach ($tags as $tag) {
                    $itemTag = Tag::where('name', trim($tag))->first();

                    if (!$itemTag) {

                        $itemTag = Tag::create(['name' => trim($tag), 'slug' => Str::slug(trim($tag))]);
                    }

                    $tagIds[] = $itemTag->id;
                }
            }

            if (empty($request->id)) { //create
                if ($request->hasFile('thumbnail')) {
                    $name = 'thumbnail_' . Carbon::now()->timestamp . '.' . $request->file('thumbnail')->getClientOriginalExtension();
                    $request->thumbnail = $name;
                    $request->file('thumbnail')->storeAs('article', $name, 'public');
                }

                $article = new Article;
                $article->user_id = $request->user_id;
                $article->title = $request->title;
                $article->slug = SlugService::createSlug(Article::class, 'slug', $request->title);
                $article->thumbnail = $request->thumbnail;
                $article->content =  $request->content;
                $article->category_id =  $request->category;


                DB::beginTransaction();
                try {
                    $article->save();
                    if (!empty($request->tag) || $request->tag != '') {
                        $article->tags()->attach($tagIds);
                    }
                    DB::commit();
                    return response()->json(['status' => true]);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            } else { //update



                $article = Article::find($request->id);
                $article->user_id = $request->user_id;
                $article->title = $request->title;
                $article->slug = $request->slug;
                // $article->thumbnail = $request->thumbnail;
                // $article->slug = SlugService::createSlug(Article::class, 'slug', $request->title);
                $article->content =  $request->content;
                $article->category_id =  $request->category;
                if ($request->hasFile('thumbnail')) {
                    if (Storage::exists('public/article/' . $request->old_thumbnail)) {
                        Storage::delete('public/article/' . $request->old_thumbnail);
                    }
                    $name = 'thumbnail_' . Carbon::now()->timestamp . '.' . $request->file('thumbnail')->getClientOriginalExtension();
                    $article->thumbnail = $name;
                    $request->file('thumbnail')->storeAs('article', $name, 'public');
                }

                DB::beginTransaction();
                try {
                    $article->save();
                    $article->tags()->sync($tagIds);
                    DB::commit();
                    return response()->json(['status' => true]);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        };
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if (Storage::exists('public/article/' . $article->thumbnail)) {
            Storage::delete('public/article/' . $article->thumbnail);
        }
        $article->delete();
        $article->tags()->detach();
        return response()->json(['status' => true]);
    }
}