{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> --}}
@extends('front.layouts.main')
@section('content')
    <main id="content" role="main">
        <!-- Article Section -->
        <div class="container space-2 space-lg-3">
            {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="mb-5">
                    </div>
                    <div class="card border w-md-85 w-lg-100 mx-md-auto">
                        @csrf
                        <div class=" card-header bg-custom text-white text-center py-4 px-5 px-md-6">
                            <h4 class="text-white mb-0">VERIFIKASI EMAIL</h4>
                        </div>
                        <div class="card-body p-md-6">
                            <div class="row">

                                <div class="col-sm-12">
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="alert alert-success" role="alert">
                                            A new verification link has been sent to the email address you provided during
                                            registration.
                                        </div>
                                    @endif
                                    <div class="mb-4">
                                        Terima kasih telah mendaftar! Sebelum memulai, dapatkah Anda memverifikasi alamat
                                        email
                                        Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email kepada Anda?
                                        Jika
                                        Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan email
                                        lain
                                        kepada Anda.
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-8 text-sm-left">

                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <div>
                                            <button type="submit" class="btn btn-sm btn-custom transition-3d-hover">Resend
                                                Verification Email
                                                <i class="fa fa-angle-right fa-sm ml-1"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-4 text-sm-left">
                                    <form method="POST" id="logout">
                                        @csrf
                                        <button type="button" onclick="logout()"
                                            class="btn btn-sm btn-soft-secondary transition-3d-hover">Log
                                            Out
                                            <i class="fa-solid fa-right-from-bracket ml-1"></i></button>
                                    </form>
                                </div>
                                <div class="col-sm-12 text-sm-right ">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        <!-- End Article Section -->
    </main>
@endsection
