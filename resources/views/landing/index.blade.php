@extends('layouts.app')
@section('content')
    <div class="relative">
        <div class="w-full h-[100vh] lg:h-[70vh] relative">
            <div class="w-full h-[100vh] lg:h-[70vh] absolute top-0 bg-gradient-to-t from-blue-800/80 to-blue-800/10">
                <div
                    class="max-w-7xl mx-auto h-full flex justify-center items-center px-5 lg:items-end lg:justify-between lg:pb-20 lg:px-20">
                    <div class="pb-20">
                        <div class="bg-blue-500 w-40 pb-2 px-2">
                            <h1 class="text-4xl font-medium text-white">Booking</h1>
                        </div>
                        <h1 class="text-6xl font-bold text-white">Ruangan Meeting</h1>
                    </div>
                    <div class="w-[30em] py-10 bg-white rounded-lg px-5 space-y-6">
                        <div class="space-y-2">
                            <label for="" class="text-sm text-gray-300">Pilih Cabang</label>
                            <select name="" id="" class="w-full rounded-lg bg-slate-100 border-0 py-3"
                                disabled>
                                <option value="">Balikpapan</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <input type="text" class="w-full rounded-lg bg-slate-100 border-0 py-3">
                        </div>
                        <div>
                            <button type="button"
                                class="w-full rounded-lg bg-blue-500 py-3 text-white text-lg font-medium">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                alt="" class="w-full h-full object-cover -z-10">
        </div>
        <div class="max-w-7xl mx-auto py-20 px-5">
            <div class="w-full pb-8">
                <h1 class="text-3xl font-semibold text-slate-700">Ruangan</h1>
                <p>Ruangan meeting yang tersedia.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($rooms as $room)
                    <div class="w-full shadow-lg shadow-gray-200 border border-gray-200 py-4 px-4 rounded-xl">
                        <p class="font-semibold text-lg">{{ $room['name'] }}</p>
                        <div class="py-2">
                            <p class="text-blue-500">{{ $room['branch'] }}</p>
                        </div>
                        <div>
                            <div class="py-4">
                                <p class="text-gray-400 text-sm">Fasilitas</p>
                            </div>
                            <div class="w-full flex space-x-3 overflow-x-scroll hide-scroll">
                                @foreach ($room['facilities'] as $facilities)
                                    <span class="flex-shrink-0 text-sm py-1 px-3 rounded bg-blue-50 border border-blue-500 text-blue-500">{{ $facilities }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
