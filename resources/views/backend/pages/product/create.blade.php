@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Add Product</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('merchant.product.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('merchant.product.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                       <label for="inputStore" class="col-form-label">Store <span
                                                class="text-danger">*</span></label>
                                                <select class="form-control" name="store_id" id="store_id">
                                           <option value="0" >--Select Store--</option>
                                            @foreach ($storeList as $storeId=>$storename)
                                            <option value="{{ $storeId }}" >{{$storename}}</option>
                                            @endforeach
                                        </select>
                                        @error('store_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="inputCategory" class="col-form-label">Category <span
                                                class="text-danger">*</span></label>
                                                <select class="form-control" name="category_id" id="category_id">
                                           <option value="0" >--Select Category--</option>
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="name" placeholder="Enter title"
                                            value="{{ old('title') }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function() {
            $(document).on("change", "#store_id", function () {
                var storeid = $("#store_id").val();
                $.ajax({
                url: "{{URL::to('merchant/product-get-category')}}",
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    store_id: storeid,
                },
                success: function (response) {
                    $('#category_id').html(response.html);
                },
            }); //ajax
            });
        });
    </script>
@endpush