<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Card;
use Auth;
class CardsController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    public function new($listing_id){
      return view('card.new' , ['listing_id' => $listing_id]);
    }

    public function store(Request $request){

      //errorがあれば、$errorsに渡して自動で前のページに戻る
      $validator = $request->validate([
        'title' => 'required|max:255'
      ]);

      $card = new Card;
      $card->title = $request->title;
      $card->comment = $request->comment;
      $card->user_id = Auth::user()->id;
      $card->list_id = $request->listing_id;
      $card->save();

      return redirect('/');
    }

    public function edit($card_id){
      $card = Card::findOrFail($card_id); //$listing_idに該当するlistingを配列で取得
      return view('card.edit' , ['card' => $card]);
    }

    public function update(Request $request){

        //errorがあれば、$errorsに渡して自動で前のページに戻る
        $validator = $request->validate([
          'title' => 'required|max:255'
        ]);

        $card = Card::findOrFail($request->id);
        $card->title = $request->title;
        $card->comment = $request->comment;
        $card->save();

        return redirect('/');
    }

    public function destroy($card_id){
      $card = Card::findOrFail($card_id);
      $card->delete();
      return redirect('/');
    }

}
