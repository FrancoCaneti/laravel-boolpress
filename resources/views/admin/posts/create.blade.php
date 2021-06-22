@extends('layouts.app')

@section('content')
   <div class="container">
      <h1 class="mb-5">Create new Post</h1>
      
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
            <form action="{{ route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')

             <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control"  name="title" id="title" value="{{ old('title') }}">
             </div>

             <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"  rows="6"></textarea>
             </div>
             <div class="mb-3">
                  <label for="category_id">Category</label>
                   <select  class="form-control" name="category_id" id="Category_id ">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                   </select>     
               </div>
                <button class="btn btn-primary" type="submit">Create a new Post  
               </div>

                </button>
            </form>
          </div>
     </div>
</div>
   
@endsection