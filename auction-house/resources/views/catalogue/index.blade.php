@section('pageName', 'Catalogue List')
<x-app-layout>

    <div class="card bg-white p-3 mx-auto">
        <div class="card-header">
            <h1 class="text-center display-6 ">Catalogues List</h1>
            {{--            @can('users.create')--}}


            @if(($auctionID ?? '') && auth()->user()->isUserAdmin() )
            <a href="{{ route('catalogues.create', ['auctionID' => $auctionID]) }}" class="btn btn-outline-success btn-sm m-3"><span>Add Catalogue</span></a>
            @endif
                {{--            @endcan--}}
        </div>
        <div class="card-body">

            @forelse($cataloguesFetchedDetails as $index => $catalogueDetail)
                <div class="card m-4">
                    <div class="card-header">
                        <h1 class="fw-bold"> Catalogue {{$index+1}}</h1>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Auction Title:</th>
                                        <td>{{$catalogueDetail->auction->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Location:</th>
                                        <td>{{$catalogueDetail->auction->address}}</td>
                                        <th>Auction Start Date:</th>
                                        <td>{{$catalogueDetail->auction->start_date}}</td>

                                    </tr>
                                    <tr>
                                        <th>Lot Reference Number:</th>
                                        <td>{{$catalogueDetail->item->lot_reference_id}}
                                        <th>Auction End Date:</th>
                                        <td>{{$catalogueDetail->auction->end_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Lot Number:</th>
                                        <td>{{$catalogueDetail->lot_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Production:</th>
                                        <td>{{$catalogueDetail->item->produced_year}}</td>
                                    </tr>
                                    <tr>
                                        <th>Piece Title:</th>
                                        <td>{{$catalogueDetail->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Estimated Price (In pounds):</th>
                                        <td>{{$catalogueDetail->estimated_price}}</td>
                                    </tr>

                                    @if($catalogueDetail->item->itemCategory->dimension)
                                    <tr>
                                        <th>Dimensions:</th>
                                        <td>{{$catalogueDetail->item->itemCategory->dimension}}</td>
                                    </tr>
                                    @endif
                                    @if($catalogueDetail->item->itemCategory->image_type_of)
                                    <tr>
                                        <th>Image Type:</th>
                                        <td>{{$catalogueDetail->item->itemCategory->image_type_of}}</td>
                                    </tr>
                                    @endif

                                    @if($catalogueDetail->item->itemCategory->is_framed)
                                    <tr>
                                        <th>Framed:</th>
                                        <td>{{$catalogueDetail->item->itemCategory->is_framed}}</td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <th>Artist:</th>
                                        <td>{{$catalogueDetail->item->artist_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Lot Description:</th>
                                        <td>{{$catalogueDetail->description}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                            @if($catalogueDetail->item->image_path)
                                <img class="mx-auto" src="{{$catalogueDetail->item->image_path}}" height="450px" width="600px" alt="Item Image">
                            @endif

                            @if(($auctionID ?? '') && auth()->user()->isUserAdmin())
                            <a href="{{route('bids.index', ['auctionID' => $catalogueDetail->auction->id, 'itemID' => $catalogueDetail->item->id])}}" class="btn btn-sm btn-outline-primary">View Biddings</a>
                            <a href="{{route('catalogues.edit', $catalogueDetail->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="{{ route('catalogues.destroy', $catalogueDetail->id)}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-outline-danger my-1" onclick="return confirm('Do you want to delete ?')">Delete</button>
                            </form>
                            @elseif(auth()->user()->isUserBuyer())

                                @if($catalogueDetail->auction->start_date >= now())
                                    <a href="{{route('biddings.create',['catalogueID' => $catalogueDetail->id, 'itemID' => $catalogueDetail->item->id, 'bidType' => 'advance'])}}" class="btn btn-sm btn-outline-primary">Advance Bid</a>

                                @elseif($catalogueDetail->auction->end_date >= now())
                                    <a href="{{route('biddings.create', ['catalogueID' => $catalogueDetail->id, 'itemID' =>$catalogueDetail->item->id, 'bidType' => 'normal'])}}" class="btn btn-sm btn-outline-primary">Bid</a>
                                @endif

                            @endif
                        </div>

                </div>
                    @empty
                    <div>
                        <h1> No Record Found</h1>
                    </div>

            @endforelse

                @if(!($auctionID ?? ''))
                    <div class="m-2 px-3">
                    {{$cataloguesFetchedDetails->links()}}
                    </div>
                @endif
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
