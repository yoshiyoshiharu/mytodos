<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;
class ListingsController extends Controller
{
    //listコントローラを呼び出したとき、ログインしていなければ、ログイン画面に飛ばす。
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $listings = Listing::where('user_id' , Auth::user()->id)
        ->orderBy('created_at' , 'asc') //古い順
        ->get();
      $cards = Card::where('user_id' , Auth::user()->id)
        ->orderBy('created_at' , 'asc') //古い順
        ->get();

        return view('listing.index' , ['listings'=>$listings ,'cards' => $cards]);
    }

    public function new(){
      return view('listing.new');
    }

    public function store(Request $request){

      //errorがあれば、$errorsに渡して自動で前のページに戻る
      $validator = $request->validate([
        'title' => 'required|max:255'
      ]);

      $listing = new Listing;
      $listing->title = $request->title;
      $listing->user_id = Auth::user()->id;

      $listing->save();

      return redirect('/');
    }

    public function edit($listing_id){
      $listing = Listing::findOrFail($listing_id); //$listing_idに該当するlistingを配列で取得
      return view('listing.edit' , ['listing' => $listing]);
    }

    public function update(Request $request){

        //errorがあれば、$errorsに渡して自動で前のページに戻る
        $validator = $request->validate([
          'title' => 'required|max:255'
        ]);

        $listing = Listing::findOrFail($request->id);
        $listing->title = $request->title;

        $listing->save();

        return redirect('/');
    }

    public function destroy($listing_id){
      $listing = Listing::findOrFail($listing_id);
      $listing->delete();
      return redirect('/');
    }
}
