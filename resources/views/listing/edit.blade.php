@extends('layouts.app')

@section('content')
<div class="panel-body">
  <!-- validation error -->
  @include('commons.errors')
  <form class="form-horizontal" action="{{url('listingsupdate')}}" method="post">
    {{ csrf_field()}}
    {{ method_field('patch')}}
    <div class="form-group">
      <label class="col-sm-3 control-label">リスト名</label>
      <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$listing->id}}">
        <input type="text" name="title" value="{{old('title' , $listing->title)}}">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"></i> 更新 </button>
      </div>
    </div>
  </form>
</div>
@endsection
