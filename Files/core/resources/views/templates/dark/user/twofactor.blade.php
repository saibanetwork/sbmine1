@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row @if (!auth()->user()->ts) justify-content-center @endif">

        @if (!auth()->user()->ts)
            <div class="col-sm-6">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Add Your Account')</h5>
                    </div>

                    <div class="card-body">
                        <h6 class="mb-3">
                            @lang('Use the QR code or setup key on your Google Authenticator app to add your account. ')
                        </h6>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <img class="mx-auto" src="{{ $qrCodeUrl }}">
                            </div>

                            <div class="col-sm-12">
                                <label class="form-label">@lang('Setup Key')</label>
                                <div class="input-group">
                                    <input class="form-control form--control referralURL" name="key" readonly type="text" value="{{ $secret }}">
                                    <button class="input-group-text append-icon--btn btn--sm copytext" id="copyBoard" type="button"> <i class="fa fa-copy"></i> </button>
                                </div>
                            </div>
                        </div>

                        <label class="mt-2"><i class="fa fa-info-circle"></i> @lang('Help')</label>
                        <p>@lang('Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.') <a class="text--base" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">@lang('Download')</a></p>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->ts)
            <div class="col-sm-12">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Disable 2FA Security')</h5>
                    </div>
                    <form action="{{ route('user.twofactor.disable') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <input name="key" type="hidden" value="{{ $secret }}">
                            <div class="form-group">
                                <label class="form-label">@lang('Google Authenticatior OTP')</label>
                                <input class="form--control" name="code" required type="text">
                            </div>

                            <button class="btn--base w-100" type="submit">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="col-sm-6">
                <div class="card custom--card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('Enable 2FA Security')</h5>
                    </div>
                    <form action="{{ route('user.twofactor.enable') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <input name="key" type="hidden" value="{{ $secret }}">
                            <div class="form-group">
                                <label class="form-label">@lang('Google Authenticatior OTP')</label>
                                <input class="form--control" name="code" required type="text">
                            </div>
                            <button class="btn--base w-100" type="submit">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('style')
    <style>
        .copied::after {
            background-color: #{{ gs('base_color') }};
        }
    </style>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('#copyBoard').click(function() {
                var copyText = document.getElementsByClassName("referralURL");
                copyText = copyText[0];
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                /*For mobile devices*/
                document.execCommand("copy");
                copyText.blur();
                this.classList.add('copied');
                setTimeout(() => this.classList.remove('copied'), 1500);
            });
        })(jQuery);
    </script>
@endpush
