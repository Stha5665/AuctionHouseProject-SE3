{{--This for making the title of page dynamic--}}
@section('pageName', 'Add Catalogue')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Add Catalogue</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" action="{{route('catalogues.store')}}">
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">
                    {{--                    for Item name--}}
                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <input type="hidden" class="form-control" name="auction_id" value="{{$auctionID}}">
                        <label>Title<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
                        {{--                        This for showing error message--}}
                        @error('title')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <label>Lot Number<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="number" class="form-control" name="lot_number" value="{{old('lot_number')}}" min="1" required>
                        {{--                        This for showing error message--}}
                        @error('lot_number')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <label>Estimated Price To Bid<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="number" class="form-control" name="estimated_price" value="{{old('estimated_price')}}" min="1" required>
                        {{--                        This for showing error message--}}
                        @error('estimated_price')
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

                    <div class="col-md-12 mt-2">
                        {{--             show the status      --}}
                        <label>Select Item<span class="text-bg-danger">*</span></label>
                        <select class="form-control" name="item_id" required>
                            @forelse($itemNames as $itemName)
                                <option value="{{$itemName->id}}" {{old('item_id') == $itemName->id ? 'selected':''}}>{{$itemName->name}}</option>
                            @empty
                                <option value="">Not Found</option>
                            @endforelse
                        </select>
                        @error('$itemName')
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
