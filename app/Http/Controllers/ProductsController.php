<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductsController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('products.index', ['products' => Product::getList()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $model = new Product();

        return view('products.create', compact('model'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|HttpException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ], [
            'title.required' => 'field is required.',
            'price.required' => 'field is required.',
        ]);

        $product = Product::create($request);

        if ($product->save()) {
            return redirect()->route('products.index');
        } else {
            return new HttpException(400, 'Bad request');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product      $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
