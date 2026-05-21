<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Kursus Mengemudi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f5f6fa; }

        .paket-card {
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid transparent;
        }

        .paket-card:hover {
            transform: scale(1.05);
        }

        .selected {
            border: 3px solid black !important;
        }

        .manual { background-color: #d1ecf1; }
        .matic { background-color: #d4edda; }
        .kombinasi { background-color: #fff3cd; }
        .mandiri { background-color: #f8d7da; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>Pendaftaran Kursus Mengemudi</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/pendaftaran" method="POST">
                @csrf

                <h5>Data Diri</h5>

                <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                <input type="text" name="no_hp" class="form-control mb-2" placeholder="No HP" required>
                <input type="text" name="alamat" class="form-control mb-3" placeholder="Alamat" required>

                <hr>

                <h5>Pilih Jenis Paket</h5>

                <select id="jenisMobil" name="jenis_mobil" class="form-control mb-4" onchange="filterPaket()" required>
                    <option value="">-- Pilih --</option>
                    <option value="Manual">Manual</option>
                    <option value="Matic">Matic</option>
                    <option value="Kombinasi">Kombinasi</option>
                    <option value="Mandiri">Mobil Sendiri (Mandiri)</option>
                </select>

                <div class="row" id="paketContainer">
                    @foreach ($paket as $p)
                        <div class="col-md-4 mb-3 paket-item" data-jenis="{{ $p->jenis_mobil }}">
                            <div class="card paket-card p-3 text-center 
                                {{ strtolower($p->jenis_mobil) }}"
                                onclick="pilihPaket(this, '{{ $p->nama_paket }}')">

                                <h5>{{ $p->nama_paket }}</h5>
                                <h6>Rp{{ number_format($p->harga,0,',','.') }}</h6>
                                <p>{{ $p->deskripsi }}</p>

                                <span class="badge bg-dark">
                                    {{ $p->jenis_mobil }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <input type="hidden" name="paket" id="paketInput">

                <!-- INFO TRANSPORT -->
                <div id="transportInfo" class="alert alert-warning mt-3" style="display:none;">
                    <b>Biaya Tambahan Transport (Mobil Sendiri):</b><br>
                    ± 5 km : 50.000 <br>
                    ± 10 km : 100.000 <br>
                    > 10 km : 125.000
                </div>

                <hr>

                <!-- MONITORING -->
                <div id="monitoringBox" style="display:none;">
                    <h5>Monitoring Kendaraan</h5>
                    <div class="alert alert-info">
                        Manual: <span id="manualStatus">-</span><br>
                        Matic: <span id="maticStatus">-</span>
                    </div>
                </div>

                <div id="jamBox" style="display:none;">
                    <label>Jam Mulai</label>
                    <input type="time" name="jam" id="jamInput" class="form-control mb-3" required>
                </div>

                <button type="button" id="btnDaftar" class="btn btn-success w-100">
                    Daftar & Bayar
                </button>

            </form>

        </div>
    </div>
</div>

    <!-- MIDTRANS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>

    function filterPaket() {
        let jenis = document.getElementById('jenisMobil').value;
        let items = document.querySelectorAll('.paket-item');
        let transport = document.getElementById('transportInfo');
        let monitoring = document.getElementById('monitoringBox');
        let jamBox = document.getElementById('jamBox');

        items.forEach(item => {
            item.style.display = (item.dataset.jenis === jenis) ? 'block' : 'none';
        });

        if (!jenis) {
            monitoring.style.display = 'none';
            jamBox.style.display = 'none';
            transport.style.display = 'none';
            return;
        }

        if (jenis === 'Mandiri') {
            transport.style.display = 'block';
            monitoring.style.display = 'none';
        } else {
            transport.style.display = 'none';
            monitoring.style.display = 'block';
        }

        jamBox.style.display = 'block';
    }

    function pilihPaket(el, nama) {
        document.querySelectorAll('.paket-card').forEach(card => {
            card.classList.remove('selected');
        });

        el.classList.add('selected');
        document.getElementById('paketInput').value = nama;
    }

    document.getElementById('jamInput').addEventListener('change', function() {
        let jam = this.value;

        fetch('/cek-ketersediaan?jam=' + jam)
            .then(res => res.json())
            .then(data => {

                let manualEl = document.getElementById('manualStatus');
                let maticEl  = document.getElementById('maticStatus');
                let btn      = document.getElementById('btnDaftar');
                let jenis    = document.getElementById('jenisMobil').value;

                manualEl.innerText = data.manual;
                maticEl.innerText  = data.matic;

                manualEl.style.color = data.manual.includes('Kosong') ? 'red' : 'green';
                maticEl.style.color  = data.matic.includes('Kosong') ? 'red' : 'green';

                let manualHabis = data.manual.includes('Kosong');
                let maticHabis  = data.matic.includes('Kosong');

                if (
                    (jenis === 'Manual' && manualHabis) ||
                    (jenis === 'Matic' && maticHabis) ||
                    (jenis === 'Kombinasi' && (manualHabis || maticHabis))
                ) {
                    btn.disabled = true;
                    btn.innerText = 'Mobil Tidak Tersedia';
                } else {
                    btn.disabled = false;
                    btn.innerText = 'Daftar & Bayar';
                }
            });
    });

    document.getElementById('btnDaftar').addEventListener('click', function() {

        let form = document.querySelector('form');
        let btn  = this;

        // VALIDASI MANUAL
        if (!document.getElementById('paketInput').value) {
            alert("Pilih paket dulu!");
            return;
        }

        btn.innerText = "Memproses...";
        btn.disabled = true;

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: new FormData(form)
        })
        .then(async res => {
            let data = await res.json();

            if (!res.ok) {
                throw new Error(data.error || "Terjadi error dari server");
            }

            return data;
        })
        .then(data => {

            snap.pay(data.snap_token, {

                onSuccess: function(){
                    window.location.href = "/riwayat";
                },

                onPending: function(){
                    window.location.href = "/riwayat";
                },

                onError: function(){
                    alert("Pembayaran gagal!");
                    btn.disabled = false;
                    btn.innerText = "Daftar & Bayar";
                },

                onClose: function(){
                    btn.disabled = false;
                    btn.innerText = "Daftar & Bayar";
                }

            });

        })
        .catch(err => {
            alert(err.message);
            btn.disabled = false;
            btn.innerText = "Daftar & Bayar";
        });

    });
</script>

</body>
</html>