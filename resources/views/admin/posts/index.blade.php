@extends('layouts.app')

@section('content')
   <div class="container">
        <h1>I nostri POST</h1> 
         <a  class="btn btn-primary" href="{{route('admin.posts.create') }}">Crea un nuovo post</a>
        <table class="table mt-5">
          <thead>
            <tr>
               <th>Id</th>
               <td>Title</td>
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
                   <td>EDIT</td>
                   <td>DELETE</td>
                </tr>
               @endforeach
            </tbody>
        </table>  
        
   </div>
   @endsection