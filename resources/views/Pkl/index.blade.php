<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PKL </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('pkl.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PKL</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">SISWA</th>
                                <th scope="col">DUDI</th>
                                <th scope="col">TANGGAL MASUK</th>
                                <th scope="col">TANGGAL KELUAR</th>
                                <th scope="col">AKSI</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($pkl as $index =>$pkl)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pkl->siswa->nama }}</td>
                                <td>{{ $pkl->dudi->nama }}</td> 
                                <td>{{ $pkl->tgl_masuk }}</td>
                                <td>{{ $pkl->tgl_keluar }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pkl.destroy', $pkl->id) }}" method="POST"> 
                                        <div class="d-flex justify-content-start">
                                        <a href="{{ route('pkl.edit', $pkl->id) }}" class="btn btn-sm btn-primary mr-2">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Data Post belum Tersedia.
                          </div>
                      @endforelse
                    </tbody>
                  </table>  
                 
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
//message with toastr
@if(session()->has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!'); 

@elseif(session()->has('error'))

    toastr.error('{{ session('error') }}', 'GAGAL!'); 
    
@endif
</script>

</body>
</html>
