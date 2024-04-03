{{--This for making the title of page dynamic--}}
@section('pageName', 'Add Bid')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Add Bidding</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" action="{{route('biddings.store')}}">
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">

                    <div class="col-md-12 mt-2 font-monospace my-2">
                       <h3 style="font-size: 22px; color: red; font-weight: 600;">Minimum Biding starts from {{$maxBidding+1}} pounds. </h3>
                    </div>

                    {{--                    for Item name--}}
                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <input type="hidden" name="auction_id" value="{{$auctionID}}">
                        <input type="hidden" name="item_id" value="{{$itemID}}">
                        <input type="hidden" name="min_bid" value="{{$maxBidding+1}}">
                        <input type="hidden" name="type" value="{{$bidType}}">

                        <label>Your Bidding Amount<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="number" step="any" class="form-control" name="amount" value="{{old('amount')}}"  required>
                        {{--                        This for showing error message--}}
                        @error('amount')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{--For description--}}
                    <div class="col-md-12 mt-2">
                        {{--             show the label           --}}
                        <label>Description<span class="text-bg-danger">*</span></label>
                        {{--                        text area containing 5 rows height is taken--}}
                        <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                        {{--error then show with message--}}
                        @error('description')
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
