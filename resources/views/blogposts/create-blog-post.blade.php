@extends('layout')
@section('head')
{{-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>   --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

@section('main')
    <main class='container' style="background-color: #fff;">
        <section id='contact-us'>
            <h1 style="padding-top: 50px;">Create New Post</h1>

            @if (session('status'))
            <p style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#48e171;padding:17px 0;margin-bottom:">{{ session ('status')}}</p>                
            @endif

            {{-- contact form --}}
            <div class="contact-form">
                <form action='{{ route('blog.store') }}' method="post" enctype='multipart/form-data'>
                    @csrf
                    {{-- Title --}}
                    <label for='title'><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" />
                    @error('title')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- image --}}
                    <label for="image"><span>Image</span></label>
                    <input type="file" id='image' name='image' />
                    @error('image')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- Drop down --}}
                    <label for="categories"><span>Choose a Category</span></label>
                    <select name="category_id" id="categories">
                        <option selected disabled>Select Option </option>

                         @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>                            
                        @endforeach
                    </select>
                    @error('category_id')
                    <p style="color: red; margin-bottom:25px;">Category is required</p>                        
                    @enderror

                    {{-- body --}}
                    <label for="body"><span>Body</span></label>
                    <textarea name="body" id="body">{{ old('body') }}</textarea>
                    @error('body')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- button --}}
                    <input type="submit" value="submit"/>
                </form>
            </div>
@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#body').summernote({
        height: 400
    });
</script>

@endsection