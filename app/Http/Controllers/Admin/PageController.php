<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Halaman',
        ];
        if ($request->ajax()) {
            $data = Page::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at',
                    function ($row) {
                        return $row->created_at ? $row->created_at->format('d M Y') : '';
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
                                    <a href="' . route("admin.page.edit", $row->slug) . '" class="nav-link"><i class="fa fa-pencil"></i> Edit</a>
                                    <a target="_blank" href="' . route($row->slug) . '" class="nav-link"><i class="fa fa-eye"></i> Lihat</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        return view('admin.pages.page.index', $data);
    }


    public function create()
    {
        $data = [
            'title'  => 'Tambah Halaman',
        ];
        return view('admin.pages.page.form', $data);
    }

    public function edit(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        $data = [
            'title'  => 'Edit Halaman',
        ];
        if ($request->ajax()) {
            return response()->json($page);
        }
        if ($page) {
            return view('admin.pages.page.form', $data);
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => !empty($request->id) ? 'required|string|max:255|alpha_dash|unique:pages,slug,' . $request->id : '',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            if (empty($request->id)) { //create
                $page = new Page;
                $page->title = $request->title;
                $page->slug = SlugService::createSlug(Page::class, 'slug', $request->title);
                $page->content = $request->content;
                $page->save();
            } else { //update
                $page = Page::find($request->id);
                $page->title = $request->title;
                $page->slug = $request->slug;
                // $page->slug = SlugService::createSlug(Page::class, 'slug', $request->title);
                $page->content = $request->content;
                $page->save();
            }
            return response()->json(['status' => true]);
        };
    }

    public function destroy($id)
    {
        $data = Page::findOrFail($id);
        $data->delete();
        return response()->json(['status' => true]);
    }
}