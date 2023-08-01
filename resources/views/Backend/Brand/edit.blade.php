
@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Brand Create</h1>
            </div>
        </div>
    </div>
</div>
<div class="m-5 w-full">
    <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class=" flex">
            <div>
                <div>
                    <label for="name" class="block mb-2  font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Brad name" value="{{old('name',$brand->name)}}" required>
                </div>
                <div class=" mt-4">
                    <label for="country" class="block mb-2  font-medium text-gray-900 dark:text-white">Country:</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="" value="{{old('country',$brand->country)}}">
                </div>
                <div class=" mt-4">
                    <label for="details" class="block mb-2  font-medium text-gray-900 dark:text-white">details:</label>
                    <input type="text" name="details" id="details" class="form-control" placeholder="" value="{{old('details',$brand->details)}}">
                </div>
            </div>
            <div class=" ml-5">
                <div class=" mt-4">
                    <label for="image" class="block mb-2  font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image" id="image" aria-describedby="image-explanation" value="{{old('image',$brand->image)}}">
                </div>
            </div>
        </div>
        <div class="flex mt-5">
            <a href="{{ route('brand.index') }}" type="button" class="btn btn-danger mr-3 text-black">cancel</a>
            <button type="submit" class="btn btn-success text-black">Update</button>
        </div>
    </form>
</div>
@endsection
