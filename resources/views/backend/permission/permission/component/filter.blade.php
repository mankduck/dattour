<form action="{{ route('permission.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @include('backend.dashboard.component.perpage')
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    @include('backend.dashboard.component.keyword')
                    <a href="{{ route('permission.create') }}" class="btn btn-danger"><i
                            class="fa fa-plus mr5"></i>{{ config('apps.messages.permission.create.title') }}</a>
                </div>
            </div>
        </div>
    </div>
</form>
