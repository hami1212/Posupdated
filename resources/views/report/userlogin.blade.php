@extends('layouts.app')
@section('title', 'User Login ')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>User Login Reports</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])
                    <div class="col-md-4">
                        <label> Business name</label>
                        <select class="form-control business_id" placeholder="" id="business_id">
                            <option value="" selected>Select your option</option>
                            @foreach ($business as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-4">

                        <label> Users</label>
                        <select class="form-control user_id" placeholder="" id="user_id">
                            <option value="" selected>Select your option</option>
                            @foreach ($users as $user)
                                <option id="user_id" value="{{ $user->id }}">{{ $user->username }}
                                </option>
                            @endforeach

                        </select>

                    </div>
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @component('components.widget', ['class' => 'box-primary'])
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="user_login">
                            <thead>
                                <tr>

                                    <th>Business Name</th>
                                    <th>User Name</th>
                                    <th> Last Login</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                @endcomponent
            </div>
        </div>
    </section>
@endsection
<!-- /.content -->
{{-- @section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>
@endsection --}}
@section('javascript')
    <script>
        $(document).ready(function() {
            $("#business_id").select2();
            $("#user_id").select2();




            user_login = $('#user_login').DataTable({

                processing: true,
                // serverSide: true,

                ajax: {
                    url: "/reports/user_login",
                    data: function(d) {
                        d.business_id = business_id,
                            d.user_id = user_id

                    }

                },
                data: {

                    'business_id': business_id
                },
                data: {

                    'user_id': user_id
                },
                columns: [{
                        data: 'b_name',
                        name: 'b_name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },

                ]
            });
            var business_id = null;
            $('#business_id').on('change', function() {
                business_id = $(this).find(":selected").val();
                $("#user_login").DataTable().ajax.reload();

            });
            var user_id = null;
            $('#user_id').on('change', function() {
                user_id = $(this).find(":selected").val();
                $("#user_login").DataTable().ajax.reload();

            });
           
        });
    </script>
@endsection
