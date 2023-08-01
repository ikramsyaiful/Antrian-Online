<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    	<p>Search :</p>

	<form action="/pengguna/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
 <table>
    <tr>
			<th>Nama</th>
			<th>s</th>
			<th>asd</th>
			<th>as</th>
	</tr>

    @forelse ($data as $datas)

    <tr>
    <th>{{$loop->iteration}}</th>
     <td>{{$datas->name}}</td>
     <td>{{$datas->antri_jalan}}</td>

     <td><button class="btn btn-success" onClick="window.open('{{ route('pengguna.barcode',['data' => $datas->random]) }}');"> Ambil antrian</button></td>
      </tr>
      @empty
      <td colspan="6" class="text-center">Tidak ada data...</td>
      </table>

   @endforelse

   	Halaman : {{ $data->currentPage() }} <br/>
	Jumlah Data : {{ $data->total() }} <br/>
	Data Per Halaman : {{ $data->perPage() }} <br/>

  <td> 	{{ $data->links() }}</td>

    </body>
</html>
