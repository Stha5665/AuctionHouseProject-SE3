{{--This for making the title of page dynamic--}}
@section('pageName', 'Add Auction')
{{--This for using common layout--}}
<x-app-layout>
    {{--Available as app.blade.php--}}
    {{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
        {{--      Header starts here  --}}
        <div class="card-header">
            {{--            The title of the card--}}
            {{--            or the header--}}
            <h1 class="text-center display-6 ">Add Auction</h1>
        </div>

        {{--        card body have the form elements--}}
        <div class="card-body">
            {{--            this is the tag for the form--}}
            {{--            The form is used with method POST--}}
            {{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" enctype="multipart/form-data" action="{{route('auctions.store')}}">
                @csrf
                {{--                Main row in the grid layout--}}
                <div class="row">
                    {{--                    for Item name--}}
                    <div class="col-md-6 mt-2">
                        {{--                        label--}}
                        <label>Title<span class="text-bg-danger">*</span> </label>
                        {{--                        input type text--}}
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" required>
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
                        <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}" required>
{{--                        shows error message--}}
                        @error('start_date')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
                        {{--                        For end date--}}
                        <label>End Date<span class="text-bg-danger">*</span></label>
                        {{--                        this input stores--}}
                        {{--                        the detail of end date--}}
                        <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" required>
                        {{--                        showing error--}}
                        @error('end_date')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
                        {{--             show the Location      --}}
                        <label>Location<span class="text-bg-danger">*</span></label>
{{--                         the location available--}}
                        <select class="form-control" name="address">
{{--                            UK--}}
                            <option value="UK" {{old('address')== 'UK' ? 'selected':''}}>UK</option>
{{--                            USA--}}
                            <option value="USA"{{old('address') == 'USA' ? 'selected':''}}>USA</option>
{{--                            PARIS--}}
                            <option value="PARIS"{{old('address') == 'PARIS' ? 'selected':''}}>PARIS</option>
                        </select>
{{--                        PRINT ERROR--}}
{{--                        PRINT ERROR--}}
                        @error('address')
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
