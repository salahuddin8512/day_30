<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $image;
    private static $directory;
    private static $product;
    private static $imageName;
    private static $imageURL;


    public static function getImageUrl($request)
    {
        self::$image =$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='product-image/';
        self::$image->move(self::$directory,self::$imageName);
        return self:: $directory.self::$imageName;
    }
    public static function newProduct($request)
    {
        self::$product =new Product();
        self::saveBaseInfo(self::$product, $request, self::getImageUrl($request));

    }
    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$imageURL = self::getImageUrl($request);
        } else {
            self::$imageURL = self::$product->image;
        }
        self::saveBaseInfo(self::$product, $request, self::$imageURL);
    }

    private static function saveBaseInfo($product, $request, $imageURL)
    {
        $product->name        = $request->name;
        $product->category    = $request->category;
        $product->brand       = $request->brand;
        $product->price       = $request->price;
        $product->description = $request->description;
        $product->image       = $imageURL;
        $product->save();
    }
}
