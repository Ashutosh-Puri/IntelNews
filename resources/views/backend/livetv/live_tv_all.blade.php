@extends('admin.admin_dashboard')
@section('title')
    Live TV
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                @if ($livetv->count()<1)
                    <div class="page-title-right">
                        <a href="{{ route('add.live.tv') }}" class="btn btn-success waves-effect waves-light">
                            Add Live TV<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                @else
                    <div class="page-title-right">
                        <a href="{{ route('all.live.tv') }}" class="btn btn-danger waves-effect waves-light">
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

                        <h4 class="header-title">Data Live Tv</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Image</th>
                                    <th>URL</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($livetv as $key => $item)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>

                                        <img width="100" src="{{ asset($item->live_image) }}" alt="" srcset="">

                                    </td>

                                    <td>{{ $item->live_url }}</td>

                                    <td>{{ $item->post_date }}</td>

                                    <td>

                                        <a href="{{ route('edit.live.tv',$item->id) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>

                                        <a id="delete" href="{{ route('delete.live.tv',$item->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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
