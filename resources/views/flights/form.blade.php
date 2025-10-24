<div class="row g-3">
    <div class="col-md-4">
        <label>Kode Penerbangan</label>
        <input type="text" name="kode_penerbangan" class="form-control" value="{{ old('kode_penerbangan', $flight->kode_penerbangan ?? '') }}">
    </div>
    <div class="col-md-4">
        <label>Asal</label>
        <input type="text" name="asal" class="form-control" value="{{ old('asal', $flight->asal ?? '') }}">
    </div>
    <div class="col-md-4">
        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-control" value="{{ old('tujuan', $flight->tujuan ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Waktu Berangkat</label>
        <input type="datetime-local" name="waktu_berangkat" class="form-control" value="{{ old('waktu_berangkat', $flight->waktu_berangkat ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Waktu Tiba</label>
        <input type="datetime-local" name="waktu_tiba" class="form-control" value="{{ old('waktu_tiba', $flight->waktu_tiba ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Harga (Rp)</label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $flight->harga ?? '') }}">
    </div>
    <div class="col-md-6">
        <label>Kursi Tersedia</label>
        <input type="number" name="kursi_tersedia" class="form-control" value="{{ old('kursi_tersedia', $flight->kursi_tersedia ?? '') }}">
    </div>
</div>
