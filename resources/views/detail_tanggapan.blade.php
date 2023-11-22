<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
</body>

<div class="container">
  <center style="margin-top:1rem;">
    <h1>Detail Tanggapan Petugas</h1>
  </center>
  <h2 scope="row" class="table-secondary" style="margin-top:2rem;">Pengaduan : {{$pengaduan->isi_laporan}}</h2>
  <h6 class="table-secondary" style="margin-top:2rem;">id pengaduan : {{$tanggapan->id_pengaduan}} tanggal pengaduan :{{$tanggapan->tgl_pengaduan}}</h6>
  <form method="post" enctype="multipart/form-data">
    @method('post')
    @csrf
    <div class="mb-3">

      <label for="exampleFormControlTextarea1" class="form-label">Isi Tanggapan Disini :</label>
      <textarea class="form-control border-primary" id="exampleFormControlTextarea1" rows="3" name="tanggapan" required>{{$tanggapan->tanggapan}}</textarea>
      @error('isi_laporan')
      <div>kalimat harus lebih dari 5 huruf</div>
      @enderror('isi_laporan')
    </div>

    <select name="status">
      <option>proses</option>
      <option>selesai</option>
    </select>
    <button type="submit" class="btn btn-success">Success</button>
  </form>
  <table style="margin-top: 2rem;" class="table">
      <thead>
        <tr>
          <th scope="col" class="table-warning">Tanggapan oleh petugas: {{$tanggapan->id_petugas}}</th>
      </thead>
      <tbody>
      @foreach($pengaduan as $pengaduan)
        <tr>
          <th scope="row" class="table-secondary">{{$tanggapan->tanggapan}}</th>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
</html>