@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{url('/save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPrice1" class="form-label">price</label>
                            <input type="text" class="form-control" id="exampleInputPrice1" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputQuantity1" class="form-label">quantity</label>
                            <input type="text" class="form-control" id="exampleInputQuantity1" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCategory1" class="form-label">category</label>
                            <input type="text" class="form-control" id="exampleInputCategory1" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSku1" class="form-label">sku</label>
                            <input type="text" class="form-control" id="exampleInputSku1" name="sku">
                        </div>
                        <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                              
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection