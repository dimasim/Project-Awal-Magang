<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductNotification;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products = Product::with('category')->latest()->paginate(5);
        // return view('products.index', compact('products'));
        return view('products.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $input = $request->all();
        if ($request->hasFile('photo')) {
            $imagename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imagename);
            $input['photo'] = $imagename;   
        }
            // Product::create($input);
            $product = Product::create($input);
            $usersLogin = Auth::user();
            Mail::to($usersLogin->email)->send(new NewProductNotification($product));
            return redirect()->route('products.index')
                ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::findOrFail($id);
        $input = $request->all();
        if ($request->hasFile('photo')) {
            if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
                $oldPhotoPath = public_path('images/' . $product->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
        }
        if ($request->hasFile('photo')) {
            $imagename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imagename);
            $input['photo'] = $imagename;   
        } else {
            unset($input['photo']);
        }
        $product->update($input);
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        //hapus foto jika ada
        if ($product->photo && file_exists(public_path('images/' . $product->photo))) {
            $oldPhotoPath = public_path('images/' . $product->photo);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);  
            }
        }
        $product->delete();
        return redirect()->route('products.index')  
            ->with('success', 'Product deleted successfully.');
    }



    
   public function data()
{
    $products = Product::with('category')->select('products.*');

    return DataTables::of($products)
        ->addColumn('action', function ($product) {
            $editUrl = route('products.edit', $product->id);
            $deleteUrl = route('products.destroy', $product->id);

            $csrf = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
            $method = '<input type="hidden" name="_method" value="DELETE">';

            return '
                <form action="'.$deleteUrl.'" method="POST" class="d-inline">
                    <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                    ' . $csrf . '
                    ' . $method . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            ';
        })
        ->editColumn('photo', function ($product) {
            if ($product->photo) {
                $url = asset('images/' . $product->photo); // disesuaikan pathnya
                return '<img src="' . $url . '" width="100" class="img-rounded" />';
            }
            return 'No Photo';
        })
        ->rawColumns(['action', 'photo'])
        ->make(true);
}
   public function exportExcel()
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

    public function exportPdf()
    {
     $products = Product::with('category')->get();
     $pdf = PDF::loadView('products.pdf', compact('products'));
     return $pdf->download('products.pdf');}
}
