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
                @if(count($errors) >0)
				  <div class="alert alert-danger">
					<ul>
					   @foreach($errors->all() as $error)
					   <li>{{$error}}</li>
					   @endforeach
					<ul>
				  </div>
				  @endif

                {!!Form::open(['action' => 'App\Http\Controllers\ListingController@store','method'=>'POST'])!!}

                 
                
                   <div class="form-group">
                   {{Form::label('', 'Items Name',['for'=>'cname'])}}
                     {{Form::text('items','',['class'=>'form-control'])}}
                   </div>
                   <div class="form-group">
                   {{Form::label('', 'Amount',['for'=>'cname'])}}
                     {{Form::text('amount','',['class'=>'form-control'])}} 
                   </div>
                   <div class="form-group">

                   {{Form::label('', 'Estimate Cost',['for'=>'cname'])}}
                    {{Form::number('estimated_cost','',['class'=>'form-control'])}}
                  
                   
                   </div>
                  

                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
  
                    {!!Form::close()!!}
                  
                    
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
