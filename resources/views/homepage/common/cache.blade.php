<?php if (!empty(Auth::user())) { ?>
    <div id="button-clear-cache">
        <a href="{{route('homepage.clearCache')}}" class="tooltip" data-tooltip="Xoá Cache" data-tooltip-pos="right" data-tooltip-length="medium" style="opacity: 1">
            <img src="{{ asset('frontend/images/clean.png') }}" alt="Clear">
        </a>
    </div>
<?php }
