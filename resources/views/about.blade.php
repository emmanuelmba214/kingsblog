@extends('layout')
@section('main')
 <!-- main -->
 <main class="container">
  <section class="single-blog-post">
    <h1>About Kings Blog</h1>
    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{ asset("images/magnify.jpg") }}" alt="" />
    </div>

    <div>
      <p class="about-text">
        We brings you verified news from Nigeria,Africa and around the world.
        from entertainment to politics,politics to sport, from sports to business
        news with the intention ok keeping you updated to the happening's around the 
        world.
      </p>
    </div>
  </section>
</main>  
@endsection