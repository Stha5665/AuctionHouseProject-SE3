@section('pageName', 'Auction List')
<x-app-layout>
{{-- The table listing for the auction starts from here--}}
{{-- The card will contain the list--}}
    <div class="card bg-white p-3 mx-auto">
{{--        Card Header--}}
        <div class="card-header">
{{--         Showing title of heading   --}}
            <h1 class="text-center display-6 ">Auctions List</h1>

{{--            It checks whether the user is admin or not--}}
            @if(auth()->user()->isUserAdmin())
{{--              if the user is admin than this create button  --}}
{{--            Will be available--}}
            <a href="{{ route('auctions.create') }}" class="btn btn-outline-success btn-sm m-3"><span>Add Auction</span></a>
            @endif

{{--             This is the search form used for the advance search function--}}
            <form class="form-control" action="{{route('auctions.index')}}" method="GET">
{{--                row class of bootsrap--}}
                <div class="row">
{{--              take only column 5      --}}
                    <div class="col-md-5">
{{--                        Search by artis name--}}
                        <label>Search By Artist Name</label>
{{--                        input text--}}
                        <input type="text" class="form-control" name="advance_search_by" placeholder="Search By Artist Name" value="{{request()->input('advance_search_by') ?? ''}}">
                    </div>
{{--col-md-5--}}
{{--                    --}}
                    <div class="col-md-5">
{{--                        Filter by the start date--}}
                        <label>Start Date</label>
{{--                        store the date by this input--}}
                        <input type="date" class="form-control" name="start_date" value="{{request()->input('start_date') ?? ''}}">
                    </div>
{{--For the search buttong--}}
                    <div class="col-md-2">
{{--                        button with some bootstrap class is used--}}
                        <button class="btn btn-outline-primary mt-4">Search</button>
                    </div>
{{--ends--}}
                </div>
{{--end of search form--}}
            </form>
        </div>
{{--        Table showing the list of auctions--}}
        <div class="card-body">
{{--            this responsive class makes the table responsive--}}
            <div class="table-responsive">
{{--                id myTable is used as the datatable plugin--}}
                <table id="myTable" class="display">
{{--                    defining the head of table--}}
                    <thead>
{{--                    title--}}
                        <th>Title</th>
{{--description of auction--}}
                        <th>Description</th>
{{----}}
                        <th>Is Archived </th>
{{--address--}}
                        <th>Address </th>
{{--start date--}}
                        <th>Start Date</th>
{{--end date--}}
                        <th>End Date</th>
                        <th>Action</th>
                    </thead>
{{-- this displays and list alll the items or acutions details--}}
                    <tbody>
                    @foreach($itemsDetails as $index => $auctionDetailData)
{{--                        it loops through list of collections of auctions--}}
                        <tr>
{{--                            prints title--}}
                            <td>{{$auctionDetailData->title}}</td>
{{--                            descriptions--}}
                            <td>{{$auctionDetailData->description}}</td>
                            <td>{{$auctionDetailData->is_archived}}</td>
{{--                            address of auction--}}
                            <td>{{$auctionDetailData->address}}</td>
{{--                            start_datee--}}
{{--                            end date--}}
                            <td>{{$auctionDetailData->start_date}}</td>
                            <td>{{$auctionDetailData->end_date}}</td>

                            <td>
{{--                                check whether the user is admin or not--}}
                                @if(auth()->user()->isUserAdmin())
{{--                                    if the user is admin provid delete edit archive button--}}
                                @if(count($auctionDetailData->catalogues) == 0)


                                <form method="POST" action="{{ route('auctions.destroy', $auctionDetailData->id)}}">
{{--                                    for deleting the auction--}}
                                    @csrf
{{--                                    --}}
                                    @method('DELETE')
{{--                                    This will ask for the confirmation of delete --}}
                                    <button onclick="return confirm('Do you want to delete ?')" class="btn btn-outline-danger">Delete</button>
                                </form>
                                    @endif
{{--                                It will display edit button--}}
                                <a class="btn btn-outline-primary my-2" href="{{route('auctions.edit', $auctionDetailData->id)}}">Edit</a>
{{--                                archive button will archiv the selected auction--}}
                                <a class="btn btn-outline-secondary my-2" href="{{route('auctions.archive', $auctionDetailData->id)}}">Archive</a>
                                @endif
{{--                                if user is not admin then view catalogues is only available--}}
{{--                                if user is not admin then view catalogues is only available--}}
                                <a class="btn btn-outline-success my-2" href="{{route('catalogues.index', ['auctionID' => $auctionDetailData->id])}}">View Catalogue</a>
                            </td>
                        </tr>
                    @endforeach
{{--end of foreach--}}
{{--end of table--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    ends--}}


    @section('script')
        <script>
            $(function(){
                let table = new DataTable('#myTable')
            });

        </script>
    @endsection
</x-app-layout>
