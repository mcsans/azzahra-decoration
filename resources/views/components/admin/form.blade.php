@props(['action' => '', 'method' => '', 'enctype' => ''])

<div class="card o-hidden border-0 shadow mb-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-6">
                <div class="p-5">
                    <form action="{{ $action }}" method="{{ $method }}" enctype="{{ $enctype }}" class="user">
                        {{ $slot }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
