<table class="table">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Rata - rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $item)
        <tr>
            <td>{{ $item->nama_lengkap() }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->agama }}</td>
            <td>{{ $item->rataRataNilai() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>