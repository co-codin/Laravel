@component('files.partials._file', compact('file'))
    @slot('links')
        <div class="level">
            <div class="level-left">
                <p class="level-item">
                    <a href="">Preview file</a>
                </p>

                <p class="level-item">
                    <a href="">Approve</a>
                </p>

                <p class="level-item">
                    <a href="">Reject</a>
                </p>
            </div>
        </div>
    @endslot
@endcomponent
