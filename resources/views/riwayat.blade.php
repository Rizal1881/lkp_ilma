<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pendaftaran</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .card {
            border-radius: 15px;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .btn-batal {
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>Riwayat Pendaftaran</h4>
        </div>

        <div class="card-body">

            <!-- ALERT -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">

                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Jenis Mobil</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Order ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $r)
                            <tr>

                                <td>{{ $r->nama }}</td>
                                <td>{{ $r->paket }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $r->jenis_mobil }}
                                    </span>
                                </td>

                                <td>
                                    {{ $r->jam_mulai }} - {{ $r->jam_selesai }}
                                </td>

                                <td>
                                    @if($r->payment_status == 'paid')
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($r->payment_status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Gagal</span>
                                    @endif
                                </td>

                                <td>{{ $r->order_id ?? '-' }}</td>

                                <!-- 🔥 BUTTON BATAL -->
                                <td>
                                    @if($r->status == 'aktif')
                                        <form action="/batal/{{ $r->id }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-batal"
                                                onclick="return confirm('Yakin ingin membatalkan?')">
                                                Batal
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge bg-secondary">Dibatalkan</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>