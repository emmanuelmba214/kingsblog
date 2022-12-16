@extends('layout')

@section('header')
    <!-- header -->
    <header class="header" style="background-image: url({{ asset('images/pen.jpg') }});">
      <div class="header-text">
        <h1>Kings Blog</h1>
        <h4>Dashboard of verified news...</h4>
      </div>
      <div class="overlay"></div>
    </header>

{{-- @endsection --}}


@section('main')
    <!-- main -->
    <main class="container">
      <h2 class="header-title">Latest Blog Posts</h2>
      <section class="cards-blog latest-blog">
        @foreach ($posts as $post )
        <div class="card-blog-content">
        <div class="yab">
          <img style='width:22rem; height:22rem; padding:1cm' src="{{asset($post->imagePath)}}" alt="" />
          <h4>
           <a  href ="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
           <p class="time">
            {{ $post->created_at->diffForHumans() }}
             <span> | By {{ $post->user->name }}</span>
           </p>
          </h4>
               
       </div>     
        @endforeach
      </section>
    </main>
@endsection