@section('pageName', 'Pending List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">Pending Sales List</h1>

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
                        <th>Estimated Price</th>

                    </thead>

                    <tbody>
                    @foreach($pendingSaleDetails as $index => $pendingSaleDetail)
                        <tr>
                            <td>{{$pendingSaleDetail->name}}</td>
                            <td>Lot-{{$pendingSaleDetail->lot_reference_id}}</td>
                            <td>{{$pendingSaleDetail->artist_name}}</td>
                            <td>{{$pendingSaleDetail->produced_year}}</td>
                            <td>{{$pendingSaleDetail->subject_classification}}</td>
                            <td>{{($pendingSaleDetail->bids[0] ?? '')?$pendingSaleDetail->bids[0]->amount-206 : '335'}} pounds</td>
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
