@extends('layout')
@section('main')
 <!-- main -->
 <main class="container">
  <h2 class="header-title">All Blog Posts</h2>
  
  @if (session('status'))
  <p style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#48e171;padding:17px 0;margin-bottom:">{{ session ('status')}}</p>                
  @endif
  <div class="searchbar">
    <form action="">
      <input type="text" placeholder="Search..." name="search" />

      <button type="submit">
        <i class="fa fa-search"></i>
      </button>

    </form>
  </div>
  <div class="categories">
    <ul>
      @foreach ($categories as $category )
      <li style="background-color:blue"><a href="{{ route('blog.index', ['category' => $category->name]) }}">{{ $category->name }}</a></li>
      @endforeach
          
    </ul>
  </div>
  
  <section class="cards-blog latest-blog">    
   @forelse ($posts as $post )
   <div class="card-blog-content">
   
    <div class="yab">
      <img style='width:22rem; height:22rem; padding:1cm' src="{{asset($post->imagePath)}}" alt="" />
     <h4>
      <a  href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
      <p class="time">
        {{ $post->created_at->diffForHumans() }}
         <span> | By {{ $post->user->name }}</span>
       </p>
     </h4>   
  </div>
    
    @auth
    @if (auth()->user()->id === $post->user->id)
    <div style="display: flex;" class="post-buttons">
     <a style=
     "background-color: blue;
      color:white;
       font-size:10px;
       height:5px;
       margin-left:3px;
       padding:15px 32px;
       text-align:center;
     " href="{{ route('blog.edit', $post) }}">EDIT</a>
     <form action="{{ route('blog.destroy', $post) }}" method="post">
       @csrf
       @method('delete')
       <input style=
       "background-color: red;
       color:white;
       font-size:10px;
       height:1px;
       margin-left:3px;
       padding:15px 32px;
       text-align:center;
       " type="submit" value="DELETE">
     </form>
   </div>
    @endif
   @endauth
     </div>
     
        
   
   
  @empty
    <p>sorry, currently there is no blog post related to that search</p>   
      
   @endforelse

   
   
  </section>

 
</main>  
 {{-- <!-- pagination -->
 <div class="pagination" id="pagination">
  <a href="">&laquo;</a>
  <a class="active" href="">1</a>
  <a href="">2</a>
  <a href="">3</a>
  <a href="">4</a>
  <a href="">5</a>
  <a href="">&raquo;</a>
</div> --}}
{{ $posts->links('pagination::default') }}
<br>
@endsection