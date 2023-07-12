@extends('admin.admin_dashboard')

@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                @if ($banner->count()<1)
                    <div class="page-title-right">
                        <a href="{{ route('add.banner') }}" class="btn btn-success waves-effect waves-light">
                            Add Banner<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </a>
                    </div>
                @else
                    <div class="page-title-right">
                        <a href="{{ route('all.banner') }}" class="btn btn-danger waves-effect waves-light">
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

                        <h4 class="header-title">Data Banners</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Home Banner One</th>
                                    <th>Home Banner Two</th>
                                    <th>Home Banner Three</th>
                                    <th>Home Banner Four</th>
                                    <th>News Category Banner</th>
                                    <th>News Detail Banner</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($banner as $key => $item)

                                <tr>

                                    <td>{{ $key+1 }}</td>

                                    <td>

                                        <img width="100" src="{{ asset($item->home_one) }}" alt="" srcset="">

                                    </td>
                                    <td>

                                        <img width="100" src="{{ asset($item->home_two) }}" alt="" srcset="">

                                    </td>
                                    <td>

                                        <img width="100" src="{{ asset($item->home_three) }}" alt="" srcset="">

                                    </td>
                                    <td>

                                        <img width="100" src="{{ asset($item->home_four) }}" alt="" srcset="">

                                    </td>
                                    <td>

                                        <img width="100" src="{{ asset($item->news_category_one) }}" alt="" srcset="">

                                    </td>
                                    <td>

                                        <img width="100" src="{{ asset($item->news_details_one) }}" alt="" srcset="">

                                    </td>

                                    

                                    <td>

                                        <a href="{{ route('edit.banner',$item->id) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>

                                        <a id="delete" href="{{ route('delete.banner',$item->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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
