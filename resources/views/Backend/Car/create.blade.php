
@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Car Create</h1>
            </div>
        </div>
    </div>
</div>
<div class="m-5 w-full">
    <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" flex">
            <div>
                <div>
                    <label for="name" class="block mb-2  font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Car name" value="{{old('name',$car->name)}}" required>
                </div>
                <div class="mt-4 xl:w-96">
                    <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-white">Select Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                      @foreach ($brands as $brand)
                      <option @if($brand->id==$car->brand_id) selected @endif
                       name="brand_id" value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                  </select>
                  @error('brand_id')<span class="text-red-600">{{$message}}</span>@enderror
               </div>
                <div class=" mt-4">
                    <label for="model" class="block mb-2  font-medium text-gray-900 dark:text-white">Model:</label>
                    <input type="text" name="model" id="model" class="form-control" placeholder="" value="{{old('model',$car->model)}}">
                </div>
                <div class=" mt-4">
                    <label for="number" class="block mb-2  font-medium text-gray-900 dark:text-white">Number:</label>
                    <input type="text" name="number" id="number" class="form-control" placeholder="Car number" value="{{old('number',$car->number)}}" required>
                </div>
                <div class=" mt-4">
                    <label for="price" class="block mb-2  font-medium text-gray-900 dark:text-white">Price per Day:</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Car price" value="{{old('price',$car->price)}}" required>
                </div>
            </div>
            <div class=" ml-5">
                <div class=" mt-4">
                    <label for="image" class="block mb-2  font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image" id="image" aria-describedby="image-explanation" value="{{old('image',$car->image)}}">
                </div>
                <div class=" mt-4">
                    <label for="seat" class="block mb-2  font-medium text-gray-900 dark:text-white">Seat:</label>
                    <input type="text" name="seat" id="seat" class="form-control" placeholder="" value="{{old('seat',$car->seat)}}">
                </div>
                <div class=" mt-4">
                    <label for="details" class="block mb-2  font-medium text-gray-900 dark:text-white">details:</label>
                    <input type="text" name="details" id="details" class="form-control" placeholder="" value="{{old('details',$car->details)}}">
                </div>
            </div>
        </div>
        <div class="flex mt-5">
            <a href="{{ route('brand.index') }}" type="button" class="btn btn-danger mr-3 text-black">cancel</a>
            <button type="submit" class="btn btn-success text-black">Add</button>
        </div>
    </form>
</div>
@endsection
