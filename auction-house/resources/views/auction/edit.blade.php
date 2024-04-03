{{--This for making the title of page dynamic--}}
@section('pageName', ' Edit Auctions')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Edit Auction</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" enctype="multipart/form-data" action="{{route('auctions.update', $auctionDetailData->id)}}">
                @method('PUT')
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">
                    {{--                    for Item name--}}
                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <label>Title<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="title" value="{{$auctionDetailData->title}}" required>
                        {{--                        This for showing error message--}}
                        @error('title')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{--                    For category Field--}}
                    <div class="col-md-6 mt-2">
                        {{--                        Label for category--}}
                        <label>Start Date<span class="text-bg-danger">*</span> </label>
                        {{--                        input field--}}
                        <input type="date" class="form-control" name="start_date" value="{{$auctionDetailData->start_date}}" required>
                        @error('start_date')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        {{--                        For artist name--}}
                        <label>End Date<span class="text-bg-danger">*</span></label>
                        {{--                        this input stores--}}
                        {{--                        the detail of artist--}}
                        <input type="date" class="form-control" name="end_date" value="{{$auctionDetailData->end_date}}" required>
                        {{--                        showing error--}}
                        @error('end_date')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2">
                        {{--             show the Location      --}}
                        <label>Location<span class="text-bg-danger">*</span></label>
                        <select class="form-control" name="address">
                            <option value="UK" {{$auctionDetailData->address== 'UK' ? 'selected':''}}>UK</option>
                            <option value="USA"{{$auctionDetailData->address == 'USA' ? 'selected':''}}>USA</option>
                            <option value="PARIS"{{$auctionDetailData->address == 'PARIS' ? 'selected':''}}>PARIS</option>
                        </select>
                        @error('address')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{--For description--}}
                    <div class="col-md-12 mt-2">
                        {{--             show the label           --}}
                        <label>Description<span class="text-bg-danger">*</span></label>
                        {{--                        text area containing 5 rows height is taken--}}
                        <textarea class="form-control" name="description" rows="5">{{$auctionDetailData->description}}</textarea>
                        {{--error then show with message--}}
                        @error('description')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--             show the status      --}}
                        <label>Status<span class="text-bg-danger">*</span></label>
                        <select class="form-control" name="status">
                            <option value="open" {{$auctionDetailData->status == 'open' ? 'selected':''}}>Open</option>
                            <option value="close"{{$auctionDetailData->status == 'close' ? 'selected':''}}>Close</option>
                        </select>
                        @error('status')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--             show the status      --}}
                        <label>Is Archived<span class="text-bg-danger">?</span></label>
                        <select class="form-control" name="is_archived">
                            <option value="yes" {{$auctionDetailData->is_archived == 'yes' ? 'selected':''}}>Yes</option>
                            <option value="no" {{$auctionDetailData->is_archived == 'no' ? 'selected':''}}>No</option>
                        </select>
                        @error('is_archived')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{--                    Submit button to submit the form--}}
                    <div class="col-md-12  my-3">
                        {{--                        button--}}
                        <button type="submit" class="btn btn-outline-dark ">
                            Submit
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>

{{--page ends here--}}
