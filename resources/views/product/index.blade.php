@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}
                    </h3>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('product.create') }}" class="btn btn-dark btn-sm ">Add
                            product</a>
                      </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('message.alert_msg')
                    <table id="userTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Product_name</th>
                                <th>Category</th>
                                <th>Product_image</th>
                                <th>Price</th>
                                <th>manufacture</th>
                                <th>publish_date</th>
                                <th>Description</th>
                                <th>status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($product->count()>0)
                            @foreach ($product as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Product_name }}</td>
                                <td>{{ $item->category->Category_name }}</td>
                                <td><img src="{{asset('images')}}/{{ $item->Product_image }}" width="100" height="100"></td>
                                <td>{{ $item->Price }}</td>
                                <td>
                                    @php
                                    $manufactures=json_decode($item->manufacture)
                                    @endphp
                                    @foreach($manufactures as $i)
                                        {{$i}},
                                    @endforeach
                                    </td>
                                <td>{{ $item->publish_date }}</td>
                                <td>{{ $item->Description }}</td>
                                <td>
                                    @if($item->Status == "1")
                                    <button type="button" class="btn btn-primary">Active</button>
                                    @else
                                    <button type="button" class="btn btn-danger">Inactive</button>
                                    @endif 
                                </td>

                                <td>
                                    <form class="deleteForm float-left"
                                        action="{{ route('product.destroy',$item->id) }}" method="post">
                                        <button class="btn btn-sm btn-danger ml-2" type="submit"
                                            id="deleteButton">delete
                                        </button>
                                        {!! method_field('delete') !!}
                                        {!! csrf_field() !!}
                                    </form>
                                    <a href="{{ route('product.edit', $item->id)}}"
                                        class="btn btn-sm  ml-2 btn-primary">edit</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td>No data is available</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




