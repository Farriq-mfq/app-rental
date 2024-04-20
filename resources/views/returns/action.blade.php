<div class="d-flex align-items-center gap-2">
    <form onsubmit="return confirm('yakin ingin menghapus data ini ?')" method="POST"
        action="{{ route('return-rents.destroy', ['return_rent' => $id]) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>
