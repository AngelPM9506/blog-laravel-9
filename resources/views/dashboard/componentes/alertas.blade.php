<div class="alertas container">
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="alert alert-danger">
                <p>{{ $e }}</p>
            </div>
        @endforeach
    @endif
</div>
