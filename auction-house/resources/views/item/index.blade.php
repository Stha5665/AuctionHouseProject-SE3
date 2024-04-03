@section('pageName', 'Items List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">Items List</h1>

            @if(auth()->user()->status == 'verified')
                <a href="{{ route('items.create') }}" class="btn btn-outline-success btn-sm m-3"><span>Add Item</span></a>
            @endif


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display">
                    <thead>
                        <th>Name</th>
                        <th>Lot No</th>
                        <th>Status </th>
                        <th>Artist Name</th>
                        <th>Produced Year</th>
                        <th>Category</th>
                        <th>Subject Classification</th>
                        <th>Description</th>
                        <th>Archived</th>
                        <th>Used Medium</th>
                        <th>Used Material</th>
                        <th>Used Weight</th>
                        <th>Framed ?</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                    @foreach($itemsDetails as $index => $itemDetail)
                        <tr>
                            <td>{{$itemDetail->name}}</td>
                            <td>Lot-{{$itemDetail->lot_reference_id}}</td>
                            <td>{{$itemDetail->status}}</td>
                            <td>{{$itemDetail->artist_name}}</td>
                            <td>{{$itemDetail->produced_year}}</td>
                            <td>{{$itemDetail->itemCategory->category_name}}</td>
                            <td>{{$itemDetail->subject_classification}}</td>
                            <td>{{$itemDetail->description}}</td>
                            <td>{{$itemDetail->is_archived}}</td>
                            <td>{{$itemDetail->itemCategory->used_medium ?? 'not required'}}</td>
                            <td>{{$itemDetail->itemCategory->used_material ?? 'not required'}}</td>
                            <td>{{$itemDetail->itemCategory->weight ?? 'not required'}}</td>
                            <td>{{$itemDetail->itemCategory->is_framed ?? 'not required'}}</td>
                            <td>{{$itemDetail->user->userFullName()}}</td>
                            <td>
                                <form method="POST" action="{{ route('items.destroy', $itemDetail->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Do you want to delete ?')" class="btn btn-outline-danger">Delete</button>
                                </form>
                                <a class="btn btn-outline-primary my-2" href="{{route('items.edit', $itemDetail->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
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
