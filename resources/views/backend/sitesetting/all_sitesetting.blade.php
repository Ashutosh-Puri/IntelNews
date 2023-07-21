@extends('admin.admin_dashboard')
@section('title')
    Site Setting
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                @if ($sitesetting->count()<1)
                    <div class="page-title-right">
                        <a href="{{ route('add.site.setting') }}" class="btn btn-success waves-effect waves-light">
                            Add Site Setting<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                @else
                    <div class="page-title-right">
                        <a href="{{ route('all.site.setting') }}" class="btn btn-danger waves-effect waves-light">
                            Only One Record Is Allowd !<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                @endif
                
                    
                    <h4 class="page-title">Datatables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="header-title">Data Site Setting</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Social 1</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>
                                
                                @foreach ($sitesetting as $key => $item)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>
                                        <img width="60" height="60" class="rounded-circle" src="{{ (!empty( $item->logo_small)) ? asset($item->logo_small) : asset('upload/no_image.jpg') }}" alt="" >
                                    </td>

                                    <td>{{ $item->dev_name }}</td>

                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{!! $item->social_icon_1 !!}</td>

                                    <td>

                                        <a href="{{ route('edit.site.setting',$item->id) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>

                                        <a id="delete" href="{{ route('delete.site.setting',$item->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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
