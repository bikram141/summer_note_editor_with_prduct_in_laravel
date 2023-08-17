@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   <div class="card-header">
                        <h3 class="card-title">{{ $page_title }}
                        </h3>
                        <a href="{{ url()->previous() }}" class="btn btn-white mr-2"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> Go Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('message.alert_msg')
                        <form action="{{ route('product.update',[$product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Product_name">Product_name</label>
                                        <input type="text" class="form-control" name="Product_name" value="{{$product->Product_name}}"
                                            id="Product_name" placeholder="Product_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">category</label>
                                    <select id="inputState" class="form-select" name="cat_id">
                                      <option value=""selected>Choose..category</option>
                                      @foreach(App\Models\Category::all() as $category)
                                      <option  value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->Title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Title">Product_image</label>
                                         <img src="{{ asset('/images/'.$product->Product_image) }}" alt="avatar"
                                            class="rounded-circle img-thumbnail img-fluid" style="width: 150px; height:150px;">
                                            <label for="Product_image">Image</label>
                                            <input type="file" class="form-control" name="Product_image"
                                                id="Product_image">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Price">Price</label>
                                        <input type="text" class="form-control" name="Price" value="{{$product->Price}}"
                                            id="Price" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-ms-4 mt-2">
                                    <div class="form-check">
                                        <label class="form-check-label" for="gridCheck">
                                            manufacture
                                          </label>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="manufacture[]" type="checkbox" id="inlineCheckbox1" value="manufacture1" @if($product->manufacture == "manufacture1") checked @endif>
                                            <label class="form-check-label" for="inlineCheckbox1">manufacture 1</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="manufacture[]" type="checkbox" id="inlineCheckbox2" value="manufacture2" @if($product->manufacture == "manufacture2") checked @endif>
                                            <label class="form-check-label" for="inlineCheckbox2">manufacture 2</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="manufacture[]" type="checkbox" id="inlineCheckbox2" value="manufacture3" @if($product->manufacture == "manufacture3") checked @endif>
                                            <label class="form-check-label" for="inlineCheckbox2">manufacture 3</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                            <textarea class="form-control" placeholder="any Description" name="Description" id="summernote">{{$product->Description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-ms-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="gridCheck">
                                            Status
                                          </label>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" @if($product->Status == "1") checked
                                            @endif>
                                            <label class="form-check-label" for="inlineRadio1">Active</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0"  @if($product->Status == "0") checked
                                            @endif>
                                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                          </div>
                                    </div>
                                  </div>

                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-warning mr-2"> Cancel</a>

                                </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
       </div>
    </section>
    <!-- /.content -->


@endsection

