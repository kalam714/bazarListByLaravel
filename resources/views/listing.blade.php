@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <span class="btn btn-info btn-xs"><a  href="{{url('/listing')}}">BazarList</a></span> <span class="pull-right" >
                 <a  href="{{url('/listing')}}" class="btn btn-info btn-xs">Your list</a></span> 
                 <span class="pull-right" > <a  href="{{url('/listing/create')}}" class="btn btn-info btn-xs">Create list</a></span> 
                 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                   <tr>
                   <th>Items</th>
                   <th>Amount</th>
                   <th>Estimate Cost</th> 
                   <th>Action</th>
                   <th>Status</th>

                   </tr>
                   @foreach($listings as $listing) 
                   <tr>
                   <td>{{$listing->items}}</td>
                   <td>{{$listing->amount}}</td>
                   <td>BDT. {{$listing->estimated_cost}}</td>
                   <td><a href="/listing/edit/{{$listing->id}}">Edit</a></td>
                   <td>
                   {!!Form::open(['action' => ['App\Http\Controllers\ListingController@destroy',$listing->id],'method'=>'POST'])!!}
                   {!!Form::hidden('_method','DELETE') !!}
                   {{Form::submit('Complete',['class'=>'btn btn-danger'])}}
  
                    {!!Form::close()!!}
                   </td>
                   </tr>
                   @endforeach
                  
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
