@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>  
@endsection

@section('main')
    <main class='container' style="background-color: #fff;">
        <section id='contact-us'>
            <h1 style="padding-top: 50px;">Create New Category</h1>

            @if (session('status'))
            <p style="color: #fff; width:100%;font-size:18px;font-weight:600;text-align:center;background:#48e171;padding:17px 0;margin-bottom:">{{ session ('status')}}</p>                
            @endif

            {{-- contact form --}}
            <div class="contact-form">
                <form action='{{ route('categories.store') }}' method="post">
                    @csrf
                    {{-- name --}}
                    <label for='name'><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>                        
                    @enderror

                    {{-- button --}}
                    <input type="submit" value="submit"/>
                </form>
            </div>
            <div class="create-categories">
                <a href="{{ route('categories.index') }}">Categories list <span>&#8594</span></a>
            </div>
@endsection

@section('script')
<script>
    CKEDITOR.replace( 'body' );
</script>    
@endsection