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
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Category_name">Category_name</label>
                                        <input type="text" class="form-control" name="Category_name" value="{{old('Category_name')}}"
                                            id="Category_name" placeholder="Category_name">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                            <textarea class="form-control" placeholder="any Description" name="Description" id="Description"></textarea>
                                    </div>
                                </div>
                            

                                <div class="col-ms-4">
                                    <div class="form-check">
                                      
                                      <label class="form-check-label" for="gridCheck">
                                        Status
                                      </label>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" checked>
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="Status" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                      </div>
                                    </div>
                                  </div>

                                <div class="col-md-12 mt-5">
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

