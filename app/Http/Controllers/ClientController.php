<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use Session;
use Stripe\Charge;
use App\Models\Order;
use App\Models\Client;
use App\Models\Message;
use Stripe\Stripe;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ClientController extends Controller
{
    //
    public function home(){
        $slider = Slider::get()->first();
        
        $produits = Product::where('status',1)->orderBy('created_at','desc')->take(8)->get();
        $latestProduct = Product::where('status',1)->orderBy('created_at','asc')->take(9)->get();
        $categories = Category::get();
        return view('client.home')->with('slider',$slider)->with('produits',$produits)->with('categories',$categories)->with('latestProduct',$latestProduct);
    //   return print($sliders);
    }
    // public function lastestProduct(){
    //     $lastestProduct = Product::where('status',1)->orderBy('created_at','desc')->take(9)->get();
    //     return view('client.home')->with('lastestProduct',$lastestProduct);
    // }
    public function shop(){
        $categories = Category::get();
        $produits = Product::where('status',1)->get()->take(16);
        $latestProduct = Product::where('status',1)->orderBy('created_at','asc')->take(9)->get();
        return view ('client.shop')->with('categories',$categories)->with('produits',$produits)->with('latestProduct',$latestProduct);
    }
    public function panier(){
        if(!Session::has('cart')){
            return view('client.cart');
        }
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view ('client.cart',['products' => $cart->items]);
    }
    public function paiement(){
        if(!Session::has('client')){
            return view('client.login');
        } if(!Session::has('cart')){
            return view('client.cart');
        }

        return view ('client.checkout');
    }
    public function client_login(){
        // if(!Session::has('cart')){
        //     return view('client.panier');
        // }
        return view ('client.login');
    }
    public function creer_compte(Request $request){
        $this->validate($request,['email' =>'email|required|unique:clients',
                                  'password'=>'required|min:4']);
         $client = new Client();
         $client->email = $request->input('email');
         $client->password = bcrypt($request->input('password'));
         $client->save();
         return back()->with('status','Your Account has been created succesfully');

    }

    public function signup(){
        return view ('client.signup');
    }
 
    public function select_par_cat($name){
        $categories = Category::get();
        $produits = Product::where('product_category',$name)->where('status',1)->get();
        $latestProduct = Product::where('status',1)->orderBy('created_at','asc')->take(9)->get();

        return view('client.shop')->with('produits',$produits)->with('categories',$categories)->with('latestProduct',$latestProduct);
    }
    public function ajouter_au_panier($id){
        $produit = Product::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($produit,$id);
        Session::put('cart',$cart);
        // dd(Session::get('cart'));
        return redirect('/shop');

    }
    public function modifier_panier (Request $request, $id){
           $oldCart = Session::has('cart')? Session::get('cart'):null;
           $cart = new Cart($oldCart);
           $cart->updateQty($id, $request->quantity);
           Session::put('cart', $cart);
   
           //dd(Session::get('cart'));
           return redirect::to('/panier');
        
    }
    public function retirer_produit ($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/shop');

    }
    public function payer(Request $request){
        if(!Session::has('cart')){
            return view('client.cart');
        }
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_holZTf1sSlQNW4BD8qXw7Xiw00aw4HhPpz');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));
            $order = new Order();
            $order->name = $request->input('name');
            $order->adresse = $request->input('address');
            $order->panier = serialize($cart);
            $order->payment_id = $charge->id;
            $order->save();
            $orders = Order::where('payment_id',$charge->id)->get();
            $orders->transform(function($order,$key){
                $order->panier = unserialize($order->panier);
                return $order;
              
              });  
            $email = Session::get('client')->email;
            Mail::to($email)->send(new SendMail($orders));



          

        } catch(\Exception $e){
             Session::put('error', $e->getMessage());
            return redirect('/paiement');
        }

        Session::forget('cart');
        Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/panier')->with('status','Achat accompli avec succes');
    }
    public function acceder_compte(Request $request){
        $this->validate($request,['email' =>'email|required',
        'password'=>'required']);
        $client = Client::where('email',$request->input('email'))->first();
        if($client){
            if(Hash::check($request->input('password'), $client->password)){
                Session::put('client',$client); 
                return redirect('/shop');
            }else{
                return back()->with('status','Wrong email or password');

            }
        }else{
            return back()->with('status','You don'."'".'t have account');
        }


    }
    public function logout(){
        Session::forget('client');
        return back();

    }
    public function sendmessage(Request $request){
        $this->validate($request,['name'=>'required','email'=>'email|required','subject'=>'required','message'=>'required']);
        $message = new Message();
        $message->name = $request->input('name');
        $message->subject = $request->input('subject');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return back()->with('status','Your message has been sent successfully');
    }
    public function produitbyid($id){
        $product = Product::find($id);
        // print($product);
        return view('client.product')->with("product",$product);
    }

    public function contact(){
        return view('client.contact');
    }   
    public function search_product(){
        $search_text = $_GET['query'];  
         $categories = Category::get();
        // $produits = Product::get();
        $latestProduct = Product::where('status',1)->orderBy('created_at','asc')->take(9)->get();

        $produits = Product::where('product_name','LIKE',"%{$search_text}%")->get();
        // return print($products);
        return view('client.shop')->with('produits',$produits)->with('categories',$categories)->with('latestProduct',$latestProduct); 
    }
}
