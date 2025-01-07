<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;





class CartController extends Controller
{
    public function cartList()
    {
        return view("Panier")->with(
            [
                "cartItems" => \Cart::getContent()
            ]);

      //  return Redirpect::back()->with('cartItems');

    }
    public function addToCart(Request $request)
    {
      /* $products = \Cart::getContent();

         foreach($products as $product)
      {
    if($product->id != $request->id)
    {
    \Cart::add([
        'id' => $request->id,
        'path' => $request->path,
        'marque' => $request->marque,
        'modele' => $request->modele,
        'prix' => $request->prix,

    ]);
    session()->flash('success', ' ajouté avec succès !');
    }
    else
    {
    session()->flash('success', ' Il existe déjà au panier. !');
    }
        return back()->withInput();
    }*/
    \Cart::add([
        'id' => $request->id,
        'path' => $request->path,
        'marque' => $request->marque,
        'modele' => $request->modele,
        'prix' => $request->prix,

    ]);

    return back()->withInput();
    session()->flash('success', ' Il existe déjà au panier. !');
}
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success',' Bien Supprimer !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }
}
