@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- validation error -->
  @include('commons.errors')
  <form class="form-horizontal" action="{{url('cardsstore')}}" method="post">
    {{ csrf_field()}}
    <input type="hidden" name="listing_id" value="{{$listing_id}}">
    <div class="form-group">
      <label class="col-sm-3 control-label">カード名</label>
      <div class="col-sm-6">
        <input type="text" name="title" value="{{old('title')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">コメント</label>
      <div class="col-sm-6">
        <textarea name="comment" rows="8" cols="80"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"></i> 作成 </button>
      </div>
    </div>
  </form>
</div>
@endsection
