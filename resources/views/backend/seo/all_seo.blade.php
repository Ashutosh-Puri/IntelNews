@extends('admin.admin_dashboard')
@section('title')
    SEO
@endsection
@section('admin')

<div class="content">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    @if ($seo->count()<1)
                        <div class="page-title-right">
                            <a href="{{ route('add.seo') }}" class="btn btn-success waves-effect waves-light">
                                Add SEO<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </a>
                        </div>
                    @else
                        <div class="page-title-right">
                            <a href="{{ route('all.seo') }}" class="btn btn-danger waves-effect waves-light">
                               Only One Record Is Allowed !<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
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

                        <h4 class="header-title">Data SEO</h4>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                            <thead>

                                <tr>

                                    <th>No</th>
                                    <th>Meta Title</th>
                                    <th>Meta Author</th>
                                    <th>Meta Keyword</th>
                                    <th>Meta Description</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($seo as $key => $item)

                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->meta_title }}</td>
                                    <td>{{ $item->meta_author }}</td>
                                    <td>{{ $item->meta_keyword }}</td>
                                    <td>{{ $item->meta_description}}</td>                               
                                    <td>

                                        <a href="{{ route('edit.seo',$item->id) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></a>

                                        <a id="delete" href="{{ route('delete.seo',$item->id) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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
