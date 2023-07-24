@extends('admin.admin_dashboard')
@section('title')
    Notification
@endsection
@section('admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('read.all.notification') }}" class="btn btn-success waves-effect waves-light">
                                Read All<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </a>
                            <a href="{{ route('delete.all.notification') }}" class="btn btn-danger waves-effect waves-light">
                                Delete All<span class="btn-label-right"><i class="mdi mdi-delete"></i></span>
                            </a>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Data Notifications</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Notification</th>
                                        <th>Status</th>
                                        <th>Read At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notification as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                @php
                                                  $data =   json_decode($item->data, true); 
                                                @endphp
                                            
                                                {{ $data['message'] }}</td>
                                            <td>  
                                                @if ($item->read_at)
                                                <span class="badge bg-success text-white">Read</span>
                                                @else
                                                    <span class="badge bg-danger text-white">Unread</span>
                                                @endif 
                                            </td>


                                            <td> 
                                                {{ \Carbon\Carbon::parse($item->read_at)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('read.notification',$item->nid) }}" data-toggle="tooltip" data-placement="bottom" title="Mark As Read" class="btn btn-primary waves-effect waves-light"><i class=" fw-bold mdi mdi-check-all"></i></a>
                                                <a id="delete" href="{{ route('delete.notification',$item->nid) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
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
