<div class="card mb-3">
    @isset($image)
        <img src="{{ $image }}" class="card-img-top">
    @endisset
    <div class="card-body" data-bs-toggle="collapse" role="button" data-bs-target="#collapseExample">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $content }}</p>
        <p class="card-text"><small class="text-muted">{{ $relative_date }}</small></p>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
        </div>
    </div>
</div>
