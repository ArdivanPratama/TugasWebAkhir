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
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                    No
                </th>
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                    Nama Barang
                </th>
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                    Harga Barang
                </th>
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                    Ukuran Barang
                </th>
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                    Kategory
                </th>
                <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
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
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->nama_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->Kategory}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->ukuran_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    {{$item->harga_barang}}
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                    <form action="{{ route('deletebarang', ['id'=>$item->id_barang]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-3 py-1.5 bg-red-500 rounded">Delete</button>
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