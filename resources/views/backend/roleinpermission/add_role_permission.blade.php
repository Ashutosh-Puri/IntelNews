@extends('admin.admin_dashboard')
@section('title')
    Add Role Permission
@endsection
@section('admin')
    <style>
        .form-check{
            text-transform: capitalize;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('all.roles.permission') }}" class="btn btn-success waves-effect waves-light">
                                Back<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
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
                            <h4 class="header-title">Add Wise Permission</h4>
                            <form method="post" action="{{ route('store.roles.permission') }}" id="myForm">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="role" class="form-label">All Roles</label>
                                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                        <option hidden value="" >Select One Roles</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group form-check mb-3 form-check-primary">
                                    <input class="form-check-input" type="checkbox" id="selectall">
                                    <label class="form-check-label" for="selectall">Select All</label>
                                </div>
                                <table  id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Name</th>
                                            <th>Permission Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permission_groups as  $key => $group)
                                        <tr>
                                            <td>
                                                {{ $key+1; }}
                                            </td>
                                            <td>                                                
                                                <label class="form-check-label form-check" for="customckeck1">{{ $group->group_name }}</label>
                                            </td>
                                            <td>
                                                @php
                                                    $permission = App\Models\User::getpermissionByGroupName($group->group_name);
                                                @endphp
                                                @foreach ($permission as $permissionitem)
                                                <div class="form-group form-check mb-3 form-check-primary">
                                                    <input class="form-check-input @error('permission') is-invalid @enderror" name="permission[]" type="checkbox" value="{{ $permissionitem->id }}" id="customckeck{{ $permissionitem->id }}">
                                                    <label class="form-check-label" for="customckeck{{ $permissionitem->id }}">{{ $permissionitem->name }}</label>
                                                    @error('permission')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Data</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#selectall').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            } else{
                $('input[type = checkbox]').prop('checked',false);
            }
        });
    </script>
@endsection
