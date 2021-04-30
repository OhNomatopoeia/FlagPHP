@extends('layouts.app')

@section('content')
    <div class ="flex justify-center">
        <div class="w-3/12 bg-white p-6 rounded-lg">
            <form action=" {{ route('register')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>
                <div class="mb-4">
                    <label for="clientType" class="sr-only">Client</label>
                    <select name="clientType" id="clientType" placeholder="What type of client are you?" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('clientType') }}">
                        <option value="mediator">Mediator</option>
                        <option value="client">Client</option>
                    </select>
                    @error('clientType')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection