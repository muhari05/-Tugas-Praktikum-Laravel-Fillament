<html>
<head>
  <title>Halaman Laporan</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<h1>Halaman Laporan</h1>

<div>
    <h2>Daftar Dosen</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIDN</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosenData as $dosen)
                <tr>
                    <td>{{ $dosen->id }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div>
    <h2>Daftar Mata Kuliah</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makulData as $makul)
                <tr>
                    <td>{{ $makul->id }}</td>
                    <td>{{ $makul->nama_makul }}</td>
                    <td>{{ $makul->sks }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div>
    <h2>Daftar Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswaData as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
