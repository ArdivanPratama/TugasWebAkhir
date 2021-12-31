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