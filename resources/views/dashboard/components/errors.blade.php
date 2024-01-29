@if ($errors->any())
<div class="card border-danger" style="padding: 20px;">
    <div class="body text-danger">
        <h4 class="card-title">{{ transWord('Please fix errors') }}</h4>
        @foreach ($errors->all() as $error)
            <p class="card-text">{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
