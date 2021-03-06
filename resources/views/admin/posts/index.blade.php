@extends('layouts.app')

@section('content')
   <div class="container">
     
     @if (session('deletede'))
       <div class="alert alert-success">
         <strong>
         {{session('deleted')}}
         </strong>
         post eliminato
       </div>
      @endif
        <h1>I nostri POST</h1> 
         <a  class="btn btn-primary" href="{{route('admin.posts.create') }}">Crea un nuovo post</a>
        <table class="table mt-5">
          <thead>
            <tr>
               <th>Id</th>
               <td>Title</td>
               <th>create</th>
               <th colspan='3'>Actions</th>
            </tr>
          </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                   <td>{{ $post->id }}</td>
                   <td>{{ $post->title }}</td>
                   <td>
                   <a class="btn btn-success"
                   href="{{route('admin.posts.show', $post->id) }}">SHOW</a>
                   </td>

                    <td>
                       {{ $post->created_at->format('l/m/y') }}
                    </td>

                   <td>
                     <a  class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                   </td>
                   <td>
                      <form class="delete-post-form" action="{{route('admin.posts.destroy', $post->id) }}" method="POST">
                       @csrf
                       @method('DELETE')

                       <input  class="btn btn-danger" type="submit" value="DELETE">
                      </form>
                   </td>
                </tr>
               @endforeach
            </tbody>
        </table>  
        
   </div>
   @endsection