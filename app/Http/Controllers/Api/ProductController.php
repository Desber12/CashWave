<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Get all products
     */
    public function index(Request $request)
    {
        $products = Product::query();

        // Search berdasarkan nama produk
        if ($request->filled('name')) {
            $products->where(
                'name',
                'LIKE',
                '%' . $request->name . '%'
            );
        }

        // Filter berdasarkan category_id
        if ($request->filled('category_id')) {
            $products->where(
                'category_id',
                $request->category_id
            );
        }

        // Sorting
        if ($request->filled('order_sort') && $request->filled('order_by')) {
            $products->orderBy(
                $request->order_by,
                $request->order_sort
            );
        }

        // Ambil semua products
        $products = $products->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Product',
            'data' => $products,
        ], 200);
    }

    /**
     * Store new product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'is_favorite' => 'nullable',
        ]);

        // Cari category
        $category = Category::find($request->category_id);

        // Upload image jika ada
        $filename = null;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'public/product',
                $filename
            );
        }

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'price' => (int) $request->price,
            'stock' => (int) $request->stock,
            'category_id' => $request->category_id,
            'category' => $category ? $category->name : null,
            'image' => $filename,
            'is_favorite' => $request->is_favorite ?? 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product Created',
            'data' => $product,
        ], 201);
    }

    /**
     * Get product detail
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Product',
            'data' => $product,
        ], 200);
    }

    /**
     * Update product
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|min:3',
            'price' => 'sometimes|required|integer',
            'stock' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'is_favorite' => 'nullable',
        ]);

        if ($request->filled('name')) {
            $product->name = $request->name;
        }

        if ($request->filled('price')) {
            $product->price = (int) $request->price;
        }

        if ($request->filled('stock')) {
            $product->stock = (int) $request->stock;
        }

        if ($request->filled('category_id')) {
            $category = Category::find($request->category_id);

            $product->category_id = $request->category_id;
            $product->category = $category
                ? $category->name
                : null;
        }

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs(
                'public/product',
                $filename
            );

            $product->image = $filename;
        }

        if ($request->has('is_favorite')) {
            $product->is_favorite = $request->is_favorite;
        }

        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Product Updated',
            'data' => $product,
        ], 200);
    }

    /**
     * Delete product
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted',
        ], 200);
    }

    /**
     * Get products by category
     */
    public function getByCategory($category)
    {
        $products = Product::where(
            'category',
            $category
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully.',
            'data' => $products,
        ], 200);
    }

    /**
     * Get products by category ID
     */
    public function filterByCategory($id)
    {
        $products = Product::where(
            'category_id',
            $id
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully.',
            'data' => $products,
        ], 200);
    }
}
