@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">serial no</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">category</th>
                            <th scope="col">quantity</th>
                            <th scope="col">sku</th>
                            
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($datas as $item)
                            <?php $i++; ?>
                            <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->sku}}</td>
                            
                            <td>
                                <button><a href="{{url('/')}}/edit/{{$item->id}}">Edit</a></button>
                                <button><a href="{{url('/')}}/delete/{{$item->id}}">Delete</a></button>
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
