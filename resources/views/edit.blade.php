@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
                
                @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

            <div class="card-dark">
                <div class="card-header">
                    <h2 class="text-center">Update list</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.update',$todo->id) }}" method="post">
                        <div class="row">
                            <div class="col-sm-8">
                                {{ csrf_field() }}
                                {{ Method_field('PUT') }}
                                <div class="form-group {{ $errors->has('todo')? 'is-invalid':''}}">
                                    <input type="text" name="todo" value="{{ old('todo',$todo->todo) }}" class="form-control {{ $errors->has('todo')? 'is-invalid':''}}" placeholder="todo lists..">
                                    @if($errors->has('todo'))
                                    <span class="invalid-feedback">{{$errors->first('todo')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <button type="submit" class="btn btn-block btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
