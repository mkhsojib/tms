@extends('layouts.app')

@section('content')

    <!-- File Upload Start Here -->

    <div class="row">
        <div class="col-md-6">
            <!-- File Submit success and validation message start -->
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif


        <!-- File Submit success and validation message end -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>Input Excel File:
                <button data-toggle="modal" data-target="#fileModal" type="button" class="btn btn-primary btn-lg"><i
                            class="fa fa-upload" aria-hidden="true"></i> Upload
                </button>
            </h3>
        </div>
        <div class="col-md-6">
            <br><a class="btn btn-info pull-right"
                   href="https://www.blog.tutexp.com/wp-content/uploads/2017/11/sample.xlsx">Download Sample File</a>
        </div>
    </div>

    @include('partials.fileUploadModalForm')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Registered Users</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Login Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $key=>$user)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">All Uploads</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Updated Date</th>
                            <th>Week</th>
                            <th>Assign</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($dates as $key=>$user)


                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{$user->uploaded_time->toFormattedDateString()}}</td>
                                <td>{{$user->week_name}}</td>
                                <td>{{$user->user->name}}</td>
                                <td>
                                    <button  data-id="{{$user->id}}" class="btn btn-danger deleteButton">Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">All Login Time</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Login Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $key=>$user)
                            @if($user->last_login_time!=null)

                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->last_login_time->toFormattedDateString()}}</td>
                                </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $(".deleteButton").on('click', function () {
                var info = $(this);
                 var id = $(this).data('id');
                var r = confirm("Are you realy want to delete!");
                if (r == true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        /* the route pointing to the post function */
                        url: "{{route('admin.file.delete')}}",
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, id:id},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            if(data.status==true){
                                alert("delete successfull");
                                info.closest ('tr').remove ();
                            }

                        }
                    });

                }
            });
        });
    </script>

@endsection

