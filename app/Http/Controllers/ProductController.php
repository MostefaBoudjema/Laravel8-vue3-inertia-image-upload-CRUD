<?php

namespace App\Http\Controllers;

use App\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

                return Inertia::render('Product/Index', [
                        'Products' => Product::latest()->get()
                ]);
                // return Inertia::render('Product/Index', [
                //         'Products' => Product::all()->map(fn($product)=>[
                //                 'product_title' => $product->product_title,
                //                 'product_name' => $product->product_name,
                //                 'product_code' => $product->product_code,
                //                 'product_price' => $product->product_price,
                //                 'product_description' => $product->product_description,
                //                 'product_image' => $product->product_image,
                //         ])
                // ]);

                // $Products = Product::orderBy('updated_at','desc')->paginate(10);
                // return view('Products.index')->with('Products', $Products);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
                return Inertia::render('Product/Create');
                // return view('products.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
                $input = $request->all();
                $file = $request->file('product_image');
                $this->validation($request);
                $product_image = 'noimage.jpg';
                if ($file) {
                        $extension = $file->getClientOriginalExtension();
                        $product_image = time() . '.' . $extension;
                        $file->move('storage/Product/', $product_image);
                        Storage::put($product_image, $product_image, 'public');
                }
                $prod = new Product([
                        'product_title' => $request->get('product_title'),
                        'product_name' => $request->get('product_name'),
                        'product_code' => $request->get('product_code'),
                        'product_price' => $request->get('product_price'),
                        'product_description' => $request->get('product_description'),
                        'product_image' => $product_image,
                ]);
                $prod->save();
                if ($prod) {
                        return redirect('/products')->with('success', 'Congrats Product Saved Successfully!');
                }
                return redirect('/products')->with('error', 'Opps! Product Fail to Create!');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Product  $Product
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
                $Product = Product::find($id);
                return Inertia::render('Product/Show', compact('Product'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
                $Product = Product::find($id);
                return Inertia::render('Product/Edit', compact('Product'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Product  $Product
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
                $this->validation($request);

                $input = $request->all();
                $file = $request->file('product_image');
                if ($file) {
                        $Product = Product::find($id);
                        $this->delete_image('storage/Product/', $Product->product_image);
                        $extension = $file->getClientOriginalExtension();
                        $product_image = time() . '.' . $extension;
                        $file->move('storage/Product/', $product_image);

                        $Product = array(
                                'product_title' => $request->product_title,
                                'product_name' => $request->product_name,
                                'product_code' => $request->product_code,
                                'product_price' => $request->product_price,
                                'product_description' => $request->product_description,
                                'product_image' => $product_image
                        );
                        Product::findOrfail($id)->update($Product);
                }
                $Product = Product::find($id);
                $Product->product_title = $request->get('product_title');
                $Product->product_name = $request->get('product_name');
                $Product->product_code = $request->get('product_code');
                $Product->product_price = $request->get('product_price');
                $Product->product_description = $request->get('product_description');
                if ($file)
                        $Product->product_image = $product_image;
                $Product->update();
                //$Product->save();

                return redirect('/products')->with('success', 'Congrats Product Updated Successfully!');
                //return redirect('/products')->with('error', ''Opps! Product Fail to Update!'');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Product  $Product
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
                $Product = Product::find($id);
                $this->delete_image('storage/Product/', $Product->product_image);
                $Product->delete();
                return redirect('/products')->with('success', 'Congrats Product Deleted Successfully!');

                //Check if post exists before deleting
                /*       if (!isset($Product)){
            return redirect('/products')->with('error', 'No products Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$Product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }
*/
        }

        private function delete_image($dossier, $image)
        {
                $destination = $dossier . $image;
                if (File::exists($destination)) {
                        if ($image != 'noimage.jpg') {
                                // Delete Image            
                                File::delete($destination);
                                error_log('File::delete');
                        } else {
                                error_log('noimage else');
                        }
                } else {
                        error_log('File::existselse');
                }
        }
        private function validation($request)
        {
                $request->validate([
                        'product_title' => 'required|max:255',
                        'product_name' => 'required|max:255',
                        'product_code' => 'required|max:25',
                        'product_price' => 'required|max:255',
                        // 'product_description'=> 'required|max:255',
                        // 'product_image'=> 'required'
                ]);
        }
}
