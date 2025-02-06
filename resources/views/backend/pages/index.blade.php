@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
     
        @if($user->role_id == 1)
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Merchant</h4>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Merchant Name</th>
                                        <th> Merchant Email</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($merchentUser as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        @endif
    </div>
</div>
@endsection
