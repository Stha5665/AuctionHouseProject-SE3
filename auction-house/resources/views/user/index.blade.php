@section('pageName', 'Users List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">User List</h1>
{{--            @can('users.create')--}}
                <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm m-3"><span>Add User</span></a>
{{--            @endcan--}}
        </div>
        <div class="card-body">
            <table id="myTable" class="display">
                <thead>

                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th>Account Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach($usersDetailsData as $index => $userDetailValue)
                        <tr>

                            <td>{{$userDetailValue->userFullName()}}</td>
                            <td>{{$userDetailValue->address}}</td>
                            <td>{{$userDetailValue->email}}</td>
                            <td>{{$userDetailValue->role}}</td>
                            <td>{{$userDetailValue->phone_number}}</td>
                            <td>{{$userDetailValue->created_at}}</td>
                            <td>{{$userDetailValue->status}}</td>
                            <td>
                                <form method="POST" action="{{ route('users.destroy', $userDetailValue->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Do you want to delete ?')" class="btn btn-outline-danger">Delete</button>
                                </form>
                                <a class="btn btn-outline-primary my-2" href="{{route('users.edit', $userDetailValue->id)}}">Edit</a>
                                <br>
                                <a class="btn btn-outline-primary my-2" href="{{route('sales.index', $userDetailValue->id)}}">Sales</a>
                                <a class="btn btn-outline-primary my-2" href="{{route('pending-sales-index.blade.php', $userDetailValue->id)}}">Pending Sales</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>


    @section('script')
    <script>
        $(function(){
            let table = new DataTable('#myTable')
        });

    </script>
    @endsection
</x-app-layout>
