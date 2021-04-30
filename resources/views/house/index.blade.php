@extends('layouts.app')

@section('content')
    <div class ="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('houses')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="rooms" class="sr-only">Rooms</label>
                    <input type="number" name="rooms" id="rooms" placeholder="Number of rooms" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('rooms') }}">

                    @error('rooms')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="bathrooms" class="sr-only">Email</label>
                    <input type="number" name="bathrooms" id="bathrooms" placeholder="Number of bathrooms" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('bathrooms') }}">

                    @error('bathrooms')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="area" class="sr-only">Area</label>
                    <input type="number" name="area" id="area" placeholder="Area in square meters" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

                    @error('area')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="sr-only">Password</label>
                    <input type="number" name="price" id="price" placeholder="Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

                    @error('price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Post Listing</button>
                </div>
            </form>

            @if ($houses->count())
                @foreach($houses as $house)
                    <div class="mb-4">
                        <div href="" class="font-bold"> Listed by: {{$house->user->name}} </div> <span class="text-gray-600 text-sm">Published {{$house->created_at}} </span> 
                        <div class="flex flex-auto flex-row justify-around">
                            <div>Number of rooms:{{$house->rooms}}</div>
                            <div>Number of bathrooms:{{$house->bathrooms}}</div>
                            <div>Area: {{$house->area}}</div>
                            <div>Price: {{$house->price}}</div>
                            <div class="flex items-center">
                                <form action="{{route('houses.favorites', $house->id)}}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Favorite </button>
                                </form>
                                <form action="{{route('houses.favorites', $house->id)}}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500"> Unfavorite</button>
                                </form>
                            </div>
                            <span>{{ $house->favorites->count()}} {{ Str::plural('Favorite', $house->favorites->count())}}</span>
                        </div>
                    </div>       
                @endforeach
            @else
                <p>There are no listings</p>
            @endif
            
            
        </div>
    </div>
@endsection
