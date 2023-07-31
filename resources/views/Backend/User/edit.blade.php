
@extends('Backend.Layouts.master')
@section('content')
<div class="content-header m-8">
    <div class=" container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Create</h1>
            </div>
        </div>
    </div>
</div>
<div class="m-5 w-full">
    <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class=" flex">
            <div>
                <div>
                    <label for="name" class="block mb-2  font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your name" value="{{old('name',$user->name)}}" required>
                </div>
                <div class=" mt-4">
                    <label for="email" class="block mb-2  font-medium text-gray-900 dark:text-white">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email" value="{{old('email',$user->email)}}" required>
                </div>
                <div class=" mt-4">
                    <label for="contact" class="block mb-2  font-medium text-gray-900 dark:text-white">Contact Number:</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="" value="{{old('contact',$user->phone)}}">
                </div>
            </div>
            <div class=" ml-5">
                <div>
                    <label for="address" class="block mb-2  font-medium text-gray-900 dark:text-white">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Your address" value="{{old('address',$user->address)}}">
                </div>
                <div class=" mt-4">
                    <label for="image" class="block mb-2  font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image" id="image" aria-describedby="image-explanation" value="{{old('image',$user->image)}}">
                </div>
                <div class="mt-4 xl:w-96">
                    <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-white">Select Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                      @foreach ($roles as $role)
                      <option @if($role->id==$user->role_id) selected @endif
                       name="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                  </select>
                  @error('role_id')<span class="text-red-600">{{$message}}</span>@enderror
               </div>
            </div>
        </div>
        <div class="flex mt-5">
            <a href="{{ route('user.index') }}" type="button" class="btn btn-danger mr-3 text-black">cancel</a>
            <button type="submit" class="btn btn-success text-black">Update</button>
        </div>
    </form>
</div>
@endsection
