@extends('layouts.v_template')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Barang</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"></a></li>
          
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="my-28 mx-auto container bg-gray-900 ">
    <div class="mb-4">
        <a href="{{route('addbarang')}}" class="px-4 py-2 bg-green-600 text-black rounded">
            <i class="fas fa-plus"></i>
            Tambah Data Barang
        </a>
    </div>
    <table class="table p-4 bg-white shadow rounded-lg w-full">
        <thead>
            <tr>
                <th class="p-4 text-center">
                    No
                </th>
                <th class="p-4 text-center">
                    Gambar Barang
                </th>
                <th class="p-4 text-center">
                    Nama Barang
                </th>
                <th class="p-4 text-center">
                    Harga Barang
                </th>
                <th class="p-4 text-center">
                    Ukuran Barang
                </th>
                <th class="p-4 text-center">
                    Kategory
                </th>
                <th class="p-4 text-center">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            @php $no=1 @endphp
            @foreach ($barang as $item) 
            <tr class="text-gray-700">
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$no++}}
                </td>
                <td class="text-center">
                    <img src="{{$item->upgambar}}" alt="image" width="150">
                    
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->nama_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->harga_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->ukuran_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{ $item->kategory->nama_kategory }}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">

                        <a href="{{ route('editbarang', ['id'=>$item->id]) }}" class="px-3 py-1.5 bg-primary rounded">Edit</a>
                        

                    <form action="{{ route('deletebarang', ['id'=>$item->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="px-3 py-1.5 bg-danger rounded">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
@endsection