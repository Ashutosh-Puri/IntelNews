@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('pending.review') }}" class="btn btn-success waves-effect waves-light">
                            Pending Review<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                    <h4 class="page-title">Datatables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="header-title">Approve Review <span class="btn btn-danger">{{ count($review) }}</span> </h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Image</th>

                                    <th>News</th>

                                    <th>Username</th>

                                    <th>Comment</th>

                                    <th>Status</th>

                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($review as $key => $item)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>

                                        <img id="showImage" src="{{ asset($item['NewsPostRelation']['image']) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    </td>

                                    <td>{{ $item['NewsPostRelation']['news_title'] }}</td>

                                    <td>{{ $item['UserRelation']['name'] }}</td>

                                    <td>{{ Str::limit($item->comment,25) }}</td>

                                    <td>

                                        <span class="badge bg-success text-white">Publish</span>

                                    </td>

                                    <td>

                                        <a id="delete" href="{{ route('approve.review.delete',$item->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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

</div>

@endsection
