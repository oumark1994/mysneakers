@extends('layouts.appadmin')
@section('title')
Messages
@endsection
@section('contenu')
<div class="main-panel">
        <div class="content-wrapper">

{{Form::hidden('',$increment=1)}}

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Messages </h4>
              @if (Session::has('status'))
                   <div class="alert alert-success">
                     {{Session::get('status')}}
</div>
                  @endif
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Id #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Message</th>

                            <th>Actions</th>
                    
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{$increment}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->subject}}</td>
                            <td>{{$message->message}}</td>
                            
                        
                            <td>
                            {{-- <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_categorie/'.$category->id)}}'">Edit</button> --}}
                            <a class="btn btn-outline-danger" id="delete" href="{{url('/supprimermessage/'.$message->id)}}">Delete</a>
                            </td>
                        </tr>
                        {{Form::hidden('',$increment=$increment + 1)}}
                        @endforeach
    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
</div>
@endsection
@section('scripts')
<script src="backend/js/data-table.js"></script>
@endsection