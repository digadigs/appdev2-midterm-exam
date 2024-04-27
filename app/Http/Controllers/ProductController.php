<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function uploadImageLocal(Request $request){
        if($request->hasFile('image')){
            Storage::disk('local')->put('/', $request->file('image'));
            return "Image successfully stored in local disk driver.";
        }
        return "No image uploaded.";
    }

    public function uploadImagePublic(Request $request){
        if($request->hasFile('image')){
            Storage::disk('public')->put('/', $request->file('image'));
            return "Image successfully stored in public disk driver.";
        }
        return "No image uploaded.";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display All Products
        return response()->json(['message' => 'Display all products']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create Product
        return response()->json(['message' => 'Product created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Display Product with ID:
        return response()->json(['message' => 'Display product with ID: '. $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Product with ID: updated
        return response()->json(['message' => 'Product with ID: '. $id.' updated sucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Product with ID: deleted
        return response()->json(['message' => 'Product with ID: '. $id.' deleted sucessfully']);
    }
}