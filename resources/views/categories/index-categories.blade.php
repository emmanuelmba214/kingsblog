
@extends('layout')
@section('main')
  <div class="categories-list">
    <h1>Categories List</h1>

    
    @if (session('status'))
    <p style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#48e171;padding:17px 0;margin-bottom:">{{ session ('status')}}</p>                
    @endif
    
  @foreach ($categories as $category )
  <div class="item">
    <p>{{ $category->name }}</p>
<div>
    <a href="{{ route('categories.edit', $category) }}">Edit</a>
</div>
<form action="{{ route('categories.destroy', $category) }}" method="post">
  @method('delete')
  @csrf
    <input type="submit" value="Delete">
</form>      
</div>
  @endforeach
  <div class="index-categories">
    <a href="{{ route(('categories.create')) }}">Create category <span>&#8594</span> </a>
  </div>

  </div>
    
@endsection



{{-- 
<div class="item">
    <p>Category 2</p>
    <div>
        <a href="">Edit</a>
    </div>
    <form action="" method="">
        <input type="submit" value='Delete'>
    </form>
  </div>

  <div class="item">
    <p>Category 3</p>
    <div>
        <a href="">Edit</a>
    </div>
    <form action="" method="">
        <input type="submit" value='Delete'>
    </form>
  </div> --}}