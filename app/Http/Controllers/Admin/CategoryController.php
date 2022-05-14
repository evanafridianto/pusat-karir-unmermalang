<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Kategori',
            'category' => Category::orderBy('name', 'asc')->get(),
        ];
        if ($request->ajax()) {
            $data = Category::orderBy('created_at', 'DESC')
                ->orderBy('type', 'ASC')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
                                    <a href="javascript:void(0)" type="button" onclick="edit_category(' . $row->id . ')" class="nav-link"><i class="fa fa-pencil"></i> Hapus</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.category.index', $data);
    }

    public function select_category($parent)
    {
        $category = [];
        if ($parent == 'NewsEvent') {
            $category = Category::where('type', 'News')->orWhere('type', 'Events')
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $category = Category::where('type', $parent)
                ->orderBy('name', 'asc')
                ->get();
        }
        return response()->json($category);
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:100',
            // 'category_name' => 'required|max:100|unique:categories,name',
            'category_slug' =>  empty($request->id) ? 'required|max:255|unique:categories,slug' : 'required|max:255|unique:categories,slug,' . $request->id,
            'category_type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            if (empty($request->category_id)) { //create
                $article = Category::create(
                    [
                        'name' => $request->category_name,
                        'type' => $request->category_type,
                        'slug' =>  SlugService::createSlug(Category::class, 'slug', $request->category_name),
                    ]
                );
            } else { //update
                $article = Category::find($request->category_id);
                $article->name = $request->category_name;
                $article->slug = $request->category_slug;
                $article->type = $request->category_type;
                // $article->slug = SlugService::createSlug(Category::class, 'slug', $request->category_name);
                $article->save();
            }
            return response()->json(['status' => true]);
        };
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return response()->json(['status' => true]);
    }
}