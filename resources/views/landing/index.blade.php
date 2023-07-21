@extends('layouts.app')
@section('content')
<div class="relative">
    <div class="w-full h-[100vh] relative">
        <div class="w-full h-[100vh] absolute top-0 bg-gradient-to-t from-blue-500/80 to-transparent">
            <div class="w-full h-full flex justify-center items-center px-20">
                <div class="w-[30em] py-10 bg-white rounded-lg px-5 space-y-6">
                    <div>
                        <h3 class="text-center text-2xl font-semibold text-gray-700">Ruang Meeting LTA</h3>
                    </div>
                    <div class="space-y-2">
                        <label for="" class="text-sm text-gray-300">Pilih Cabang</label>
                        <select name="" id="" class="w-full rounded-lg bg-slate-100 border-0 py-3" disabled>
                            <option value="">Balikpapan</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                      <input type="text" class="w-full rounded-lg bg-slate-100 border-0 py-3">
                    </div>
                    <div>
                        <button type="button" class="w-full rounded-lg bg-blue-500 py-3 text-white text-lg font-medium">
                            Cari
                        </button>
                    </div>
                </div>
            </div> 
        </div>
        <img src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="" class="w-full h-full object-cover -z-10">
    </div>

</div>
@endsection