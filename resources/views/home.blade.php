@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card-dark mt-8">
                <div class="card-head text-center display-4">Todo lists</div>
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <th>Todo</th>
                            <th>Created At</th>
                        </tr>
                        @foreach($todos as $to)
                          <tr>
                            <td>{{$to->todo}}</td>
                            
                            <td>
                                <form action="{{ route('todo.delete',$to->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <small>{{$to->created_at->diffForHumans()}}</small>
                                    <a href="{{route('todo.edit',$to->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                        @if(count($todos) == 0)
                        <tr>
                            <td colspan="3">
                              <p>there is no more todo lists</p>
                          </td>
                      </tr>
                      @endif
                        {{$todos->links()}}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                
                @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

            <div class="card-dark">
                <div class="card-header">
                    <h2 class="text-center">Todo list</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.store') }}" method="post">
                        <div class="row">
                            <div class="col-sm-8">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('todo')? 'is-invalid':''}}">
                                    <input type="text" name="todo" value="{{ old('todo') }}" class="form-control {{ $errors->has('todo')? 'is-invalid':''}}" placeholder="todo lists..">
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
