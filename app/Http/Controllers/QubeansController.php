<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Product;
use App\Qubean;
use Illuminate\Http\Request;
use soofa\Soofa\Soofa;

class QubeansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qubean  $qubean
     * @return \Illuminate\Http\Response
     */
    public function show(Qubean $qubean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qubean  $qubean
     * @return \Illuminate\Http\Response
     */
    public function edit(Qubean $qubean)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qubean  $qubean
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qubean $qubean)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qubean  $qubean
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qubean $qubean)
    {
        //
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('demo.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('demo.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart(Request $request){
        if(isset($_POST['add-to-cart'])) {
            $product = new Product($request->added_product, $request->price);

            $oldCart = Session::has('cart') ? Session::get('cart') : null;

            $cart = new Cart($oldCart);
            $cart->add($product, $request->added_product);

            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
    }

    public function remove(Request $request, $product)
    {
        if(!Session::has('cart')){
            return view('demo.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach ($cart->items as $key => $value)
        {
            if ($value['product']->product == $product)
            {
                $cart->totalPrice -= $value['price'];
                $cart->totalQty -= $value['quantity'];
                unset($cart->items[$key]);
            }
        }


        $newCart = new Cart('');
        $newCart->totalPrice = $cart->totalPrice;
        $newCart->items = $cart->items;
        $newCart->totalQty = $cart->totalQty;

        $request->session()->put('cart', $newCart);

        if(Session::get('cart')->totalQty == 0)
        {
            Session::forget('cart');
        }

        return redirect()->route('home');
    }

    public function find(Request $request){
        $soofa = new Soofa(env('TILL_NO'), env('SECRET_KEY'));
        $soofa->find($request->tid);
        $result = $soofa->getTransaction();

//        $this->webhook($result);

        $transaction = new Qubean();
        $transaction->payment_status = $result[0]->status;
        $transaction->transaction_id = $result[0]->tid;
        $transaction->receipt_number = $result[0]->receipt_no;
        $transaction->sender_currency = $result[0]->sender_currency;
        $transaction->reference = $result[0]->reference;
        $transaction->amount_paid = $result[0]->gross_amount;
        $transaction->received_amount = $result[0]->net_amount;
        $transaction->sender = $result[0]->sender;

        $transaction->save();
        Session::forget('cart');
        return redirect()->route('home')->with('Successfully placed an order');

    }

    public function webhook($data){
        dd($data[0]);
    }
}
