<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
                    'title',
                    function ($row) {
                        return Str::words($row->title, 10);
                    }
                )
                ->editColumn(
                    'carousel',
                    function ($row) {
                        return $row->carousel == 1 ? 'Ya' : 'Tidak';
                    }
                )
                ->editColumn(
                    'image',
                    function ($row) {
                        // return $row->image != "" && Storage::exists('public/page/' . $row->image) ? '<a href="' . Storage::url('public/page/' . $row->image) . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . Storage::url('public/page/' . $row->image) . '"></a>' : 'Gambar tidak ditemukan';
                        return $row->image != "" && Storage::exists('public/page/' . $row->image) ? '<a href="' . Storage::url('public/page/' . $row->image) . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . Storage::url('public/page/' . $row->image) . '"></a>' : (Str::contains($row->image, 'https://') ? '<a href="' . $row->image . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . $row->image . '"></a>' : 'Gambar tidak ditemukan');
                    }
                )
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
                ->rawColumns(['carousel', 'image', 'created_at', 'action'])
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
        $addArr = Arr::add($page, 'file_exists', Storage::exists('public/page/' . $page->image));
        $data = [
            'title'  => 'Edit Halaman',
        ];
        if ($request->ajax()) {
            return response()->json($addArr);
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
            'name' => 'required',
            'title' => 'required',
            'slug' =>  empty($request->id) ? 'required|max:255|unique:pages,slug' : 'required|max:255|unique:pages,slug,' . $request->id,
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:5048|nullable',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            if (empty($request->id)) { //create

                if ($request->hasFile('image')) {
                    $name = 'image_' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->image = $name;
                    $request->file('image')->storeAs('page', $name, 'public');
                }

                $page = new Page;
                $page->name = $request->name;
                $page->title = $request->title;
                $page->slug = SlugService::createSlug(Page::class, 'slug', $request->title);
                $page->content = $request->content;
                $page->image = $request->image;
                $page->status = $request->status;
                $page->carousel = $request->carousel;
                $page->save();
            } else { //update
                $page = Page::find($request->id);
                $page->name = $request->name;
                $page->title = $request->title;
                $page->slug = $request->slug;
                // $page->image = $request->image;
                $page->status = $request->status;
                $page->carousel = $request->carousel;
                $page->content = $request->content;
                if ($request->hasFile('image')) {
                    if (Storage::exists('public/page/' . $request->old_image)) {
                        Storage::delete('public/page/' . $request->old_image);
                    }
                    $name = 'image_' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                    $page->image = $name;
                    $request->file('image')->storeAs('page', $name, 'public');
                }
                $page->save();
            }
            return response()->json(['status' => true]);
        };
    }

    public function destroy($id)
    {
        $data = Page::findOrFail($id);

        if (Storage::exists('public/page/' . $data->image)) {
            Storage::delete('public/page/' . $data->image);
        }
        $data->delete();
        return response()->json(['status' => true]);
    }
}