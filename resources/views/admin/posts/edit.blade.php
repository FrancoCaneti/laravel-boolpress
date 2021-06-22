@extends('layouts.app')

@section('content')
   <div class="container">
      <h1 class="mb-5">
      EDIT:
      <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
      </h1>
      
      @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
           @endforeach
         </ul>
       </div>
      @endif

      <div class="row">
          <div class="col-md-8 offset-md-2">
            <form action="{{ route('admin.posts.update', $post->id)}}" method="POST">
            @csrf
            @method('PATCH')

             <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control"  name="title" id="title" value="{{ old('title') }}">
             </div>

             <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"  rows="6"></textarea>
             </div>
                <button class="btn btn-primary" type="submit">Edit Post</button>

            </form>
          </div>
     </div>
</div>
   
@endsection