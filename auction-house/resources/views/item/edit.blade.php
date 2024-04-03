{{--This for making the title of page dynamic--}}
@section('pageName', 'Edit Item')
{{--This for using common layout--}}
<x-app-layout>
{{--Available as app.blade.php--}}
{{--    Form element inside card --}}
    <div class="card bg-white p-3 mx-auto">
{{--      Header starts here  --}}
        <div class="card-header">
{{--            The title of the card--}}
{{--            or the header--}}
            <h1 class="text-center display-6 ">Edit Item</h1>
        </div>

{{--        card body have the form elements--}}
        <div class="card-body">
{{--            this is the tag for the form--}}
{{--            The form is used with method POST--}}
{{--            Here ectype is multipart so that image can be uploaded--}}
            <form class="form-control" method="POST" enctype="multipart/form-data" action="{{route('items.update', $itemDetail->id)}}">
                @csrf

{{--                PUT method is used to update details in laravel--}}
                @method('PUT')
{{--                Main row in the grid layout--}}
                <div class="row">
{{--                    for Item name--}}
                    <div class="col-md-6 mt-2">
{{--                        label--}}
                        <label>Item Name<span class="text-bg-danger">*</span> </label>
{{--                        input type text--}}
                        <input type="text" class="form-control" name="name" value="{{$itemDetail->name}}" required>
{{--                        This for showing error message--}}
                        @error('name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

{{--                    For category Field--}}
                    <div class="col-md-6 mt-2">
{{--                        Label for category--}}
                        <label>Category<span class="text-bg-danger">*</span> </label>
{{--                        input field--}}
                        <input type="text" class="form-control" name="category_name" value="{{$itemDetail->itemCategory->category_name}}" required>
                        @error('category_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
{{--                        For artist name--}}
                        <label>Artist Name<span class="text-bg-danger">*</span></label>
{{--                        this input stores--}}
{{--                        the detail of artist--}}
                        <input type="text" class="form-control" name="artist_name" value="{{$itemDetail->artist_name}}" required>
{{--                        showing error--}}
                        @error('artist_name')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
{{--                        stores the produced year--}}
                        <label>Produced Year<span class="text-bg-danger">*</span></label>
{{--                        input date is used--}}
                        <input type="date" class="form-control" name="produced_year" value="{{$itemDetail->produced_year}}" required>
{{--                        show error if any validation fails--}}
                        @error('produced_year')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
{{--                        select the classification--}}
                        <label>Subject Classification<span class="text-bg-danger">*</span></label>

{{--                        drop down is used to select the classification item--}}
                        <select class="form-control" name="subject_classification" required>
{{--                            these options field inside select statement--}}
{{--                            are according to user provided details--}}
                            <option value="landscape"  {{$itemDetail->subject_classification == 'landscape' ? 'selected':''}}>Landscape</option>
                            <option value="seascape" {{$itemDetail->subject_classification == 'seascape' ? 'selected':''}}>Seascape</option>
                            <option value="portrait" {{$itemDetail->subject_classification == 'portrait' ? 'selected':''}}>Portrait</option>
                            <option value="figure" {{$itemDetail->subject_classification == 'figure' ? 'selected':''}}>Figure</option>
                            <option value="still life" {{$itemDetail->subject_classification == 'still life' ? 'selected':''}}>Still Life</option>
                            <option value="nude" {{$itemDetail->subject_classification == 'nude' ? 'selected':''}}>Nude</option>
                            <option value="animal" {{$itemDetail->subject_classification == 'animal' ? 'selected':''}}>Animal</option>
                            <option value="abstract" {{$itemDetail->subject_classification == 'abstract' ? 'selected':''}}>Abstract</option>
                            <option value="other" {{$itemDetail->subject_classification == 'other' ? 'selected':''}}>Other</option>
                        </select>
{{--                        Show error if occurred--}}
                        @error('subject_classification')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-2">
{{--                        upload image of item--}}
                        <label>Upload Image</label>
{{--                        this tag is used to upload image--}}
                        <input type="file" class="form-control" name="image_path" value="{{old('image_path')}}">
{{--                        show error below this field--}}
                        @error('image_path')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror

                    </div>

                    @if($itemDetail->image_path != NULL)
                    <div class="col-md-12 my-3">
                        <img src="{{asset($itemDetail->image_path)}}" width="250px;" height="200px;" alt="Item Image">
                    </div>
                    @endif

{{--For description--}}
                    <div class="col-md-12 mt-2">
{{--             show the label           --}}
                        <label>Description<span class="text-bg-danger">*</span></label>
{{--                        text area containing 5 rows height is taken--}}
                        <textarea class="form-control" name="description" rows="5">{{$itemDetail->description}}</textarea>
{{--error then show with message--}}
                        @error('description')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {{--                        These are the fields for different category items--}}
                    <div class="col-md-6 mt-2">
{{--                        This is the field for different category items--}}
                        <label>Medium </label>
{{--                        For storing medium of art--}}
                        <input type="text" class="form-control" name="used_medium" value="{{$itemDetail->itemCategory->used_medium ?? ''}}">
                        @error('used_medium')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
{{--                        stores the--}}
{{--                        Material used in the items
--}}
                        <label>Material </label>
{{--                        optional field--}}
                        <input type="text" class="form-control" name="used_material" value="{{$itemDetail->itemCategory->used_material ?? ''}}">
                        @error('used_material')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
{{--                    ask for weight--}}
                    <div class="col-md-6 mt-2">
{{--                        weight field--}}
                        <label>Weight </label>
{{--                        get the input field--}}
                        <input type="text" class="form-control" name="weight" value="{{$itemDetail->itemCategory->weight ?? ''}}">
                        @error('weight')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        {{--                        weight field--}}
                        <label>Dimension </label>
                        {{--                        get the input field--}}
                        <input type="text" class="form-control" name="dimension" value="{{$itemDetail->itemCategory->dimension ?? ''}}">
                        @error('dimension')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        {{--                        weight field--}}
                        <label>Type of Image</label>
                        {{--                        get the select field--}}

                        <select class="form-control" name="image_type_of">
                            <option value="BLACK" {{($itemDetail->itemCategory->image_type_of ?? '') == 'BLACK' ? 'selected':''}}>BLACK</option>
                            <option value="WHITE" {{($itemDetail->itemCategory->image_type_of ?? '') == 'WHITE' ? 'selected':''}}>WHITE</option>
                            <option value="COLOR" {{($itemDetail->itemCategory->image_type_of ?? '') == 'COLOR' ? 'selected':''}}>COLOR</option>
                        </select>
                        @error('image_type_of')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-2">
{{--                        This for the storing whether item is framed or not--}}
                        <label>Is Framed ? </label>
{{--                        radiobutton is used to detect detail--}}
{{--                      radio button yes and no  --}}
                        Yes <input type="radio" class="form-control" name="is_framed" value="yes" {{($itemDetail->itemCategory->is_framed ?? '') == 'yes' ? 'checked':''}}>
                        No <input type="radio" class="form-control" name="is_framed" value="no"  {{($itemDetail->itemCategory->is_framed ?? '') == 'no' ? 'checked':''}}>
                        @error('is_framed')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>

                    @if(auth()->user()->isUserAdmin())
                    <div class="col-md-6 mt-2">
                        {{--                        This for the storing item status--}}
                        <label>Status </label>

                        <select class="form-control" name="status">
                            <option value="open" {{$itemDetail->status == 'open'?'selected':''}}>Open</option>
                            <option value="closed"{{$itemDetail->status == 'closed' ? 'selected':''}}>Closed</option>
                        </select>
                        @error('status')
                        <span class="text-bg-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @endif



{{--                    Submit button to submit the form--}}
                    <div class="col-md-12  my-3">
                        <button type="submit" class="btn btn-outline-dark ">
                            Update
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>

{{--page ends here--}}