@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="account section-bg py-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-5">
                    <div class="card custom--card">
                        <div class="card-body">
                            <div class="mb-4">
                                <p>@lang('Your account is verified successfully. Now you can change your password. Please enter a strong password and don\'t share it with anyone.')</p>
                            </div>
                            <form action="{{ route('user.password.update') }}" method="POST">
                                @csrf
                                <input name="email" type="hidden" value="{{ $email }}">
                                <input name="token" type="hidden" value="{{ $token }}">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form--control @if (gs('secure_password')) secure-password @endif" name="password" placeholder="@lang('Password')" required type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form--control" name="password_confirmation" placeholder="@lang('Confirm Password')" required type="password">
                                </div>

                                <button class="btn btn--base w-100" type="submit"> @lang('Submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script-lib')
    <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            @if (gs('secure_password'))
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.input-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.input-group').removeClass('hover-input-popup');
                });
            @endif
        })(jQuery);
    </script>
@endpush
