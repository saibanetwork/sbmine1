@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row d-flex justify-content-center flex-wrap gy-4">
        @if ($userCoinBalances->count())
            @foreach ($userCoinBalances as $item)
                <div class="col-md-4">
                    <div class="wallet-card">
                        <div class="wallet-item flex-wrap">
                            <button class="updateBtn" data-id="{{ $item->id }}" data-title="{{ strtoupper($item->miner->coin_code) }}" data-wallet="{{ $item->wallet }}">
                                <i class="las la-edit"></i>
                            </button>
                            <div class="wallet-item__thumb">
                                <img src="{{ getImage(getFilePath('miner') . '/' . $item->miner->coin_image, getFileSize('miner')) }}" class="fit-image" alt="@lang('image')">
                            </div>
                            <div class="wallet-item__content">
                                <div class="wallet-item__info">
                                    <h5 class="wallet-item__name">{{ strtoupper($item->miner->coin_code) }} @lang('Wallet')</h5>
                                    <strong class="wallet-item__designation fs-14"> {{ showAmount($item->balance, 8, exceptZeros: true, currencyFormat: false) }} {{ strtoupper($item->miner->coin_code) }}</strong>
                                </div>
                                <div class="wallet-item__info">
                                    <h5 class="wallet-item__name">@lang('Wallet Address')</h5>
                                    <span class="wallet-item__designation fs-14">
                                        @if ($item->wallet)
                                            {{ $item->wallet }}
                                        @else
                                            @lang('No address provided yet')
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @php
                $color = '#' . gs('base_color');
            @endphp
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path d="M477 136H376a125 125 0 0 0-240 0H35a35 35 0 0 0-35 35v260a35 35 0 0 0 35 35h442a35 35 0 0 0 35-35V171a35 35 0 0 0-35-35zM256 76a95 95 0 1 1-95 95 95.11 95.11 0 0 1 95-95zm221 360H35a5 5 0 0 1-5-5V171a5 5 0 0 1 5-5h96.11c-.07 1.66-.11 3.32-.11 5a125 125 0 0 0 250 0c0-1.68 0-3.34-.11-5H477a5 5 0 0 1 5 5v75h-45a55 55 0 0 0 0 110h45v75a5 5 0 0 1-5 5zm5-160v50h-45a25 25 0 0 1 0-50z" fill="{{ $color }}" opacity="1" data-original="#000000" class=""></path>
                        <path d="M205.39 221.61a15 15 0 0 0 21.22 0l29.39-29.4 29.39 29.4a15 15 0 0 0 21.22-21.22L277.21 171l29.4-29.39a15 15 0 1 0-21.22-21.22L256 149.79l-29.39-29.4a15 15 0 1 0-21.22 21.22l29.4 29.39-29.4 29.39a15 15 0 0 0 0 21.22z" fill="{{ $color }}" opacity="1" data-original="#000000" class=""></path>
                    </g>
                </svg>
                <h5 class="mt-4 mb-0">@lang('You have no wallet yet. At first, you have to purchase our mining plans. You can purchase our plan from') <a class="text--base" href="{{ route('plans') }}">@lang('here.')</a></h5>
            </div>
        @endif
    </div>

    <div class="modal custom--modal fade" id="walletAddressModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Update Wallet - ') <span class="addressTitle"></span></h5>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="wallet">@lang('Wallet')</label>
                            <input class="form--control" id="wallet" name="wallet" placeholder="@lang('Enter wallet Address')" required type="text" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn--base w-100" type="submit">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';
        (function($) {
            $('.updateBtn').on('click', function() {
                let modal = $('#walletAddressModal');
                let data = $(this).data();

                modal.find('.addressTitle').text(data.title);
                modal.find('form').attr('action', `{{ route('user.wallet.update', '') }}/${data.id}`);
                modal.find('[name=wallet]').val(data.wallet);
                modal.modal('show');
            });
        })(jQuery)
    </script>
@endpush
