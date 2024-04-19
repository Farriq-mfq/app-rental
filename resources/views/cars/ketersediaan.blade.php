<span class="badge @if ($row->stok > 0) bg-success @else bg-danger @endif">
    @if ($row->stok > 0)
        Tersedia ({{ $row->stok }} Mobil )
    @else
        Belum tersedia / Stok habis
    @endif
</span>
