@section('pageName', 'Items List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">Bidding List</h1>

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
                    <th>Seller Name</th>
                    <th>Bidder Name</th>
                    <th>Bid Type</th>
                    <th>Estimated Amount</th>
                    <th>Bid Amount</th>
                    <th>Highest Bid Amount</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>

                    <tbody>
                    @foreach($bidDetails as $index => $bidDetail)
                        <tr>
{{--                            {{dd($bidDetails)}}--}}
                            <td>{{$bidDetail->item->name}}</td>
                            <td>Lot-{{$bidDetail->item->lot_reference_id}}</td>
                            <td>{{$bidDetail->item->status}}</td>
                            <td>{{$bidDetail->item->artist_name}}</td>
                            <td>{{$bidDetail->item->produced_year}}</td>
                            <td>{{$bidDetail->item->itemCategory->category_name}}</td>
                            <td>{{$bidDetail->item->subject_classification}}</td>
                            <td>{{$bidDetail->item->user->userFullName()}}</td>
                            <td>{{$bidDetail->user->userFullName()}}</td>
                            <td>{{$bidDetail->type}}</td>
                            <td>{{$bidDetail->amount-201}}</td>
                            <td>{{$bidDetail->amount}}</td>
                            <td>{{$bidDetail->amount+501}}</td>
                            <td>{{$bidDetail->description}}</td>
                            <td></td>

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
