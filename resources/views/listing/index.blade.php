@extends('layouts.app')

@section('content')
<div class="topPage">
  <div class="listWrapper">
    @foreach ($listings as $listing)
     <div class="list">
       <div class="list_header">
         <h2 class="list_header_title">{{ $listing->title }}</h2>
         <div class="list_header_action">
           <a onclick="return confirm('{{ $listing->title }}を削除しますか？')" href="{{ url('/listingsdelete', $listing->id) }}"><i class="fas fa-trash"></i></a>
           <a href="{{ url('/listingsedit', $listing->id) }}"><i class="fas fa-pen"></i></a>
         </div>
       </div>
       <div class="cardWrapper">
         @foreach($cards as $card)
          @if($card->list_id == $listing->id)
           <div class="card">
             <div class="card_header">
               <h3 class="card_title">{{$card->title}}</h3>
               <div class="card_header_action">
                 <a onclick="return confirm('{{ $card->title }}を削除しますか？')" href="{{url('/cardsdelete',$card->id)}}"><i class="fas fa-trash"></i></a>
                 <a href="{{url('/cardsedit',$card->id)}}"><i class="fas fa-pen"></i></a>
               </div>
             </div>
             <div class="card_comment">
               <p>{{$card->comment}}</p>
             </div>
           </div>
           @endif
          @endforeach
       </div>
       <div class="card_add">
         <a href="{{url('/cardsnew' , $listing->id)}}">カードを追加する</a>
       </div>
     </div>
    @endforeach
  </div>
</div>
@endsection
