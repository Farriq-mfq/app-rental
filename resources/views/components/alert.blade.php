@php
    $session = session()->get('alert');
@endphp
@if (session()->has('alert'))
    <div class="alert alert-{{ $session['type'] }}">
        {{ $session['message'] }}
    </div>
@endif
