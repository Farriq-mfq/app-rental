<span class="badge @if (\Carbon\Carbon::parse($row->created_at)->greaterThan(\Carbon\Carbon::parse($row->rent->selesai))) bg-danger @else bg-success @endif">
    @if (\Carbon\Carbon::parse($row->created_at)->greaterThan(\Carbon\Carbon::parse($row->rent->selesai))) Telat @else Tepat @endif
</span>
