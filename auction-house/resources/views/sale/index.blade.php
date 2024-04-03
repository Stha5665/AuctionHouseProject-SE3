@section('pageName', 'Sales List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">List</h1>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display">
                    <thead>
                    <th>Name</th>
                    <th>Lot No</th>
                    <th>Artist Name </th>
                    <th>Produced Year </th>
                    <th>Subject Classification</th>
                    <th>Bidder Name</th>
                    <th>Bid Type</th>
                    <th>Estimated Price</th>
                    <th>Bid Amount</th>

                    </thead>

                    <tbody>
                    @foreach($saleDetails as $index => $saleDetail)
                        <tr>
                            <td>{{$saleDetail->name}}</td>
                            <td>Lot-{{$saleDetail->lot_reference_id}}</td>
                            <td>{{$saleDetail->artist_name}}</td>
                            <td>{{$saleDetail->produced_year}}</td>
                            <td>{{$saleDetail->subject_classification}}</td>
                            <td>{{($saleDetail->bids[0] ?? '') ? $saleDetail->bids[0]->user->userFullName() : 'No any Bidder'}}</td>
                            <td>{{$saleDetail->type}}</td>
                            <td>{{($saleDetail->bids[0] ?? '') ? $saleDetail->bids[0]->amount-206 : '335'}} pounds</td>
                            <td>{{($saleDetail->bids[0] ?? '') ? $saleDetail->bids[0]->amount :  'No any Bidder'}} pounds</td>
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
