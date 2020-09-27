@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <span class="btn btn-info btn-xs">BazarList</span> <span class="pull-right" >
                 <a  href="{{url('/listing')}}" class="btn btn-info btn-xs">Your list</a></span> 
                 <span class="pull-right" > <a  href="{{url('/listing/create')}}" class="btn btn-info btn-xs">Create list</a></span> 
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
