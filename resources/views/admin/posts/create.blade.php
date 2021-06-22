@extends('layouts.app')

@section('content')
   <div class="container">
      <h1 class="mb-5">Crete new Post</h1>
      
      <div class="row">
          <div class="col-md-8 offset-md-2">
            <form action="{{ route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')

             <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control"  name="title" id="title">
             </div>

             <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"  rows="6"></textarea>
             </div>
                <button class="btn btn-primary" type="submit">Create a new Post</button>

            </form>
          </div>
     </div>
</div>
   
@endsection