@extends('layouts.v_template')

@section('content')
    
<section class="mb-3">
    <form action="{{ route('updatebarang', ['id'=>$barang->id]) }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <h2 class="input-group mb-3">
                    Nama Barang
                </h2>
                <div class="">
                    <div class=" relative ">
                        <input type="text" value="{{$barang->nama_barang}}" id="nama_barang" name="nama_barang" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Nama Barang"/>
                        @error('nama_barang')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card-body">
                <h2 class="input-group mb-3">
                    Jenis dan Ukuran
                </h2>
                <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                    <div>
                        <div class=" relative ">
                            <select type="text" id="Kategory_id" name="kategory_id" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                    
                                <option selected disabled>Kategory</option>
                                @foreach ($Kt as $item)
                                @if ($item->id==$barang->kategory_id)
                                <option selected='selected' value="{{$item->id}}">{{$item->nama_kategory}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->nama_kategory}}</option>
                                @endif
                                
                                @endforeach
                                    
                                </select>
                                @error('kategory_id')
                                {{$message}}
                                @enderror
                        </div>
                    </div>
                    <div>
                        <div class=" relative ">
                            <input value="{{$barang->ukuran_barang}}" type="text" id="ukuran_barang" name="ukuran_barang" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Ukuran"/>
                            @error('ukuran_barang')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3" style="padding-left: 1rem;">
                <h2 for="upgambar" class="form-label">
                    Upload Foto
                </h2>
                <input class="form-control" type="file" id="upgambar" name="upgambar">
                @error('upgambar')
                {{$message}}
                @enderror
              </div>
            <hr/>
            <div class="mb-3" style="padding-left: 1rem;">
                <h2 class="">
                    Harga
                </h2>
                <div class="w-full max-w-sm pl-2 mx-auto space-y-5 md:w-5/12 md:pl-9 md:inline-flex">
                    <div class=" relative ">
                        <input value="{{$barang->harga_barang}}" type="number" id="harga_barang" name="harga_barang" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Harga"/>
                        @error('harga_barang')
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