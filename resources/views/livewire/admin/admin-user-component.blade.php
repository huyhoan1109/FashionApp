@include('layouts.app')

@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span>All Users
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                User
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.user.add') }}" class="btn btn-sucess float-end"> Add New User</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($user -> currentPage()-1 )*$user->perPage();
                                @endphp
                                @foreach ($user as $item)
                                    @if ($item->type == '1')
                                        @php
                                            $t='Customer'
                                        @endphp
                                            
                                    @endif
                                    @if ($item->gender == '0')
                                        @php
                                            $g='Man'
                                        @endphp
                                    @else
                                        @php
                                            $g='Woman'
                                        @endphp  

                                    @endif
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->firstname }}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>{{ $g }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $t }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$user->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection