<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // If products are not in session, initialize them
        if (!session()->has('products')) {
            $initialProducts = [
                1 => [
                    'descripcion' => 'Portátil HP MD12345',
                    'modelo' => 'HP 15-1234-20',
                    'categoria' => 0,
                    'unidades' => 12,
                    'precio' => 550.50
                ],
                2 => [
                    'descripcion' => 'Tablet - Samsung Galaxy Tab A (2019)',
                    'modelo' => 'Exynos',
                    'categoria' => 5,
                    'unidades' => 200,
                    'precio' => 300
                ],
                3 => [
                    'descripcion' => 'Impresora multifunción - HP',
                    'modelo' => 'DeskJet 3762',
                    'categoria' => 4,
                    'unidades' => 2000,
                    'precio' => 69
                ],
                4 => [
                    'descripcion' => 'TV LED 40" - Thomson 40FE5606 - Full HD',
                    'modelo' => 'Thomson 40FE5606',
                    'categoria' => 3,
                    'unidades' => 300,
                    'precio' => 259
                ],
                5 => [
                    'descripcion' => 'PC Sobremesa - Acer Aspire XC-830',
                    'modelo' => 'Acer Aspire XC-830',
                    'categoria' => 1,
                    'unidades' => 20,
                    'precio' => 329
                ]
            ];
            session(['products' => $initialProducts]);
        }

        $products = session('products', []);
        // Add IDs to the products for display
        $productsWithIds = [];
        foreach ($products as $id => $product) {
            $productsWithIds[] = array_merge(['id' => $id], $product);
        }

        return view('products.home', ['products' => $productsWithIds]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = session('products', []);
        
        // Find the next available ID
        $nextId = empty($products) ? 1 : max(array_keys($products)) + 1;
        
        // Create new product
        $products[$nextId] = [
            'descripcion' => $request->input('descripcion'),
            'modelo' => $request->input('modelo'),
            'categoria' => (int)$request->input('categoria'),
            'precio' => (float)$request->input('precio'),
            'unidades' => (int)$request->input('unidades')
        ];
        
        // Store in session
        session(['products' => $products]);
        
        return redirect()->route('products.index')
                        ->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = session('products', []);
        $product = $products[$id] ?? null;
        
        if (!$product) {
            return redirect()->route('products.index')
                           ->with('error', 'Producto no encontrado');
        }
        
        $product['id'] = $id;
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = session('products', []);
        $product = $products[$id] ?? null;
        
        if (!$product) {
            return redirect()->route('products.index')
                           ->with('error', 'Producto no encontrado');
        }
        
        $product['id'] = $id;
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = session('products', []);
        
        if (!isset($products[$id])) {
            return redirect()->route('products.index')
                           ->with('error', 'Producto no encontrado');
        }

        $products[$id] = [
            'descripcion' => $request->input('descripcion'),
            'modelo' => $request->input('modelo'),
            'categoria' => (int)$request->input('categoria'),
            'precio' => (float)$request->input('precio'),
            'unidades' => (int)$request->input('unidades')
        ];

        session(['products' => $products]);
        
        return redirect()->route('products.index')
                        ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = session('products', []);
        
        if (!isset($products[$id])) {
            return redirect()->route('products.index')
                           ->with('error', 'Producto no encontrado');
        }

        unset($products[$id]);
        session(['products' => $products]);
        
        return redirect()->route('products.index')
                        ->with('success', 'Producto eliminado correctamente');
    }
}