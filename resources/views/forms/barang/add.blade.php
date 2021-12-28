@extends('layouts.v_template')

@section('content')
    
<section class="mb-3">
    <form action="" method="POST" class="">
        @csrf
        <div class="">
            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                <h2 class="max-w-sm mx-auto md:w-1/3">
                    Nama Barang
                </h2>
                <div class="">
                    <div class=" relative ">
                        <input type="text" id="nama_barang" name="nama_barang" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Nama Barang"/>
                        @error('nama_barang')
                            {{$message}}
                        @enderror
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                    <h2 class="max-w-sm mx-auto md:w-1/3">
                        Jenis dan Ukuran
                    </h2>
                    <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                        <div>
                            <div class=" relative ">
                                <select type="text" id="Kategory" name="kategory" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                    
                                    <option selected disabled>Kategory</option>
                                    @foreach ($Kt as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategory}}</option>
                                    @endforeach
                                    
        </select>
        @error('jenis_barang_id')
        {{$message}}
        @enderror
        </div>
            </div>
                <div>
                    <div class=" relative ">
                        <input type="text" id="ukuran" name="ukuran" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Ukuran"/>
                            @error('ukuran')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        <hr/>
    <div class="mb-3">
        <h2 class="max-w-sm mx-auto md:w-4/12">
            Harga
        </h2>
            <div class="w-full max-w-sm pl-2 mx-auto space-y-5 md:w-5/12 md:pl-9 md:inline-flex">
                <div class=" relative ">
                    <input type="number" id="harga" name="harga" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Harga"/>
                    @error('harga')
                {{$message}}
            @enderror
        </div>
    </div>
                                
        </div>
            <hr/>
                <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                    <button type="submit" class="">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </section>

    @endsection