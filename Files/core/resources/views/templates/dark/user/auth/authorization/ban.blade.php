@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="section py-100 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card custom--card">
                        <div class="card-body">
                            <h3 class="text-danger text-center">@lang('You are banned')</h3>
                            <p class="fw-bold mb-1">@lang('Reason'):</p>
                            <p>{{ $user->ban_reason }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
