@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>  
@endsection

@section('main')
    <main class='container' style="background-color: #fff;">
        <section id='contact-us'>
            <h1 style="padding-top: 50px;">Edit Post</h1>

            @if (session('status'))
            <p style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#48e171;padding:17px 0;margin-bottom:">{{ session ('status')}}</p>                
            @endif

            {{-- contact form --}}
            <div class="contact-form">
                <form action="{{ route('blog.update', $post) }}" method="post" enctype='multipart/form-data'>
                    @method('put')
                    @csrf
                    {{-- Title --}}
                    <label for='title'><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" />
                    @error('title')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- image --}}
                    <label for="image"><span>Image</span></label>
                    <input type="file" id='image' name='image' />
                    @error('image')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- body --}}
                    <label for="body"><span>Body</span></label>
                    <textarea name="body" id="body">{{ $post->body }}</textarea>
                    @error('body')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- button --}}
                    <input type="submit" value="submit"/>
                </form>
            </div>
@endsection

@section('script')
<script>
    CKEDITOR.replace( 'body' );
</script>    
@endsection