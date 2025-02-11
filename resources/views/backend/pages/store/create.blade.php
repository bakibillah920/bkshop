@extends('backend.layouts.app')

@section('title', 'Store Management')

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
                            <h4>Add Store</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('merchant.store.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('merchant.store.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Name <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="name" placeholder="Enter title"
                                            value="{{ old('name') }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if(!$tenant)
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Domain <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="domain" placeholder="shop_one.root_route"
                                            value="{{ old('domain') }}" class="form-control">
                                        @error('domain')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @endif
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
