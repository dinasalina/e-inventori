<div class="mb-3">
    <label>Nama Barang</label>
    <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Kod Barang</label>
    <input type="text" name="kod_barang" value="{{ old('kod_barang', $item->kod_barang ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Kuantiti</label>
    <input type="number" name="kuantiti" value="{{ old('kuantiti', $item->kuantiti ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Lokasi Simpanan</label>
    <input type="text" name="lokasi_simpanan" value="{{ old('lokasi_simpanan', $item->lokasi_simpanan ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Paras Minimum (Amaran)</label>
    <input type="number" name="paras_minimum" value="{{ old('paras_minimum', $item->paras_minimum ?? 0) }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Catatan</label>
    <textarea name="catatan" class="form-control">{{ old('catatan', $item->catatan ?? '') }}</textarea>
</div>
