@extends('layouts.app')
@section('title', 'Application Instructions – Ghana School of Law')
@section('description',
    'Step-by-step instructions for purchasing your GSL Application Voucher and completing your
    application on the applicant portal.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[260px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Admissions</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(28px,4.5vw,50px)">
                Application Instructions</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">
                Follow the steps below to purchase your Application Voucher and access the applicant portal.
            </p>
        </div>
    </section>

    {{-- STEPS --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-4xl mx-auto flex flex-col gap-10">

            {{-- Step 1 --}}
            <div class="flex flex-col gap-4 bg-gray-50 border border-gray-200 rounded-2xl p-6 sm:p-8">
                <div class="flex items-center gap-4">
                    <span
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-navy text-white font-bold text-[16px] flex items-center justify-center">1</span>
                    <h2 class="font-serif font-semibold text-[20px] sm:text-[24px] text-navy">Purchase Your Application
                        PIN</h2>
                </div>
                <p class="pl-14 text-[15px] text-gray-600 leading-[1.7] -mt-1">
                    Use either of the following payment options:
                </p>

                <div class="pl-0 sm:pl-14 grid grid-cols-1 lg:grid-cols-2 gap-5">

                    {{-- USSD --}}
                    <div class="rounded-xl p-7 flex flex-col gap-4 bg-navy shadow-md">
                        <p class="text-[11px] font-bold uppercase tracking-[2px] text-gold">Option 1</p>
                        <h3 class="font-serif font-semibold text-[18px] text-white">USSD (Any Network)</h3>
                        <ol class="text-[14px] text-cloud/70 flex flex-col gap-2">
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">1.</span>
                                Dial <span class="font-bold text-white">*887*9#</span></li>
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">2.</span>
                                Enter <span class="font-bold text-white">GSL</span></li>
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">3.</span>
                                Enter <span class="font-bold text-white">1</span> to proceed</li>
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">4.</span>
                                Wait for the payment authorisation prompt</li>
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">5.</span>
                                Enter your <span class="font-bold text-white">Mobile Money PIN</span></li>
                            <li class="flex items-start gap-2"><span class="font-bold text-gold flex-shrink-0">6.</span>
                                Enter <span class="font-bold text-white">1</span> to confirm payment</li>
                        </ol>
                    </div>

                    {{-- Online --}}
                    <div class="rounded-xl p-7 flex flex-col gap-4 bg-white border border-gray-200 shadow-md">
                        <p class="text-[11px] font-bold uppercase tracking-[2px] text-gold">Option 2</p>
                        <h3 class="font-serif font-semibold text-[18px] text-navy">Online Payment</h3>
                        <p class="text-[14px] text-gray-600 leading-[1.7]">
                            Pay securely online using <span class="font-bold text-navy">Mobile Money</span> or a
                            <span class="font-bold text-navy">Bank Card</span> (Debit / Credit).
                        </p>
                        <a href="https://online-voucher.transflowitc.com/application-forms?merchant_id=04a12dc6-e691-451c-aaf0-5382a78e88aa"
                            target="_blank" rel="noopener noreferrer"
                            class="mt-auto inline-flex items-center gap-2 self-start rounded-full bg-navy text-white text-[13px] font-semibold px-5 py-2.5 hover:bg-navy-mid transition-colors duration-200">
                            Pay Online
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line x1="7" y1="17" x2="17" y2="7" />
                                <polyline points="7 7 17 7 17 17" />
                            </svg>
                        </a>

                        <p>Select the Programme and proceed</p>
                    </div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-4">
                    <span
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-navy text-white font-bold text-[16px] flex items-center justify-center">2</span>
                    <h2 class="font-serif font-semibold text-[20px] sm:text-[24px] text-navy">Receive Your Credentials
                    </h2>
                </div>
                <div class="pl-14 flex flex-col gap-3">
                    <p class="text-[15px] text-gray-600 leading-[1.8]">
                        After successful payment, your <span class="font-bold text-navy">Serial Number</span> and
                        <span class="font-bold text-navy">Application PIN</span> are sent to you automatically via
                        <span class="font-bold text-navy">SMS</span>.
                    </p>
                    <div class="flex items-start gap-3 bg-gold/8 border border-gold/25 rounded-xl px-5 py-4">
                        <svg class="w-5 h-5 text-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <p class="text-[14px] text-gray-700 leading-[1.7]">
                            <span class="font-bold text-navy">Important:</span> Keep your Serial Number and Application
                            PIN safe - you will need them to access the applicant portal.
                        </p>
                    </div>
                    <div class="flex items-start gap-3 bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">
                        <svg class="w-5 h-5 text-navy flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 3v5h5" />
                            <path d="M3.05 13A9 9 0 1 0 6 5.3L3 8" />
                        </svg>
                        <p class="text-[14px] text-gray-700 leading-[1.7]">
                            <span class="font-bold text-navy">Lost your PIN or Serial Number?</span> Dial
                            <span class="font-bold text-navy">*887*9#</span> again on the same phone number used to
                            purchase it, then select <span class="font-bold text-navy">View History</span> to retrieve
                            it.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-4">
                    <span
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-navy text-white font-bold text-[16px] flex items-center justify-center">3</span>
                    <h2 class="font-serif font-semibold text-[20px] sm:text-[24px] text-navy">Access the Applicant
                        Portal</h2>
                </div>
                <div class="pl-14 flex flex-col gap-3">
                    <p class="text-[15px] text-gray-600 leading-[1.8]">
                        Log in using your <span class="font-bold text-navy">Serial Number</span> and
                        <span class="font-bold text-navy">Application PIN</span>.
                    </p>
                    <a href="https://sms.gslaw.school/applicant/login" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 self-start rounded-full bg-navy text-white text-[13px] font-semibold px-5 py-2.5 hover:bg-navy-mid transition-colors duration-200">
                        Go to Applicant Portal
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="7" y1="17" x2="17" y2="7" />
                            <polyline points="7 7 17 7 17 17" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-4">
                    <span
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-navy text-white font-bold text-[16px] flex items-center justify-center">4</span>
                    <h2 class="font-serif font-semibold text-[20px] sm:text-[24px] text-navy">Complete Your Application
                    </h2>
                </div>
                <ul class="pl-14 flex flex-col gap-2.5">
                    @foreach (['Complete all required sections of the application form.', 'Upload all required supporting documents.', 'Review your information carefully.', 'Submit your application.'] as $step)
                        <li class="flex items-start gap-2.5 text-[15px] text-gray-600 leading-[1.7]">
                            <svg class="w-4 h-4 text-gold flex-shrink-0 mt-1" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            {{ $step }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Important Notes --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-7 sm:p-10 flex flex-col gap-5">
                <h2 class="font-serif font-semibold text-[20px] sm:text-[24px] text-navy">Important Notes</h2>
                <ul class="flex flex-col gap-3">
                    @foreach (['Payment can be made via USSD (Mobile Money) or Online (Mobile Money or Bank Card).', 'Your Serial Number and Application PIN are generated automatically after successful payment and sent via SMS.', 'Do not share your Serial Number, Application PIN, or Mobile Money PIN with anyone.', 'Ensure all required supporting documents are uploaded before submitting your application.', 'Keep your login credentials safe until your application process is complete.'] as $note)
                        <li class="flex items-start gap-3 text-[14px] text-gray-600 leading-[1.7]">
                            <span class="w-1.5 h-1.5 rounded-full bg-gold flex-shrink-0 mt-2"></span>
                            {{ $note }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-center pt-4">
                <a href="{{ route('admissions') }}"
                    class="inline-flex items-center gap-2 text-[14px] font-semibold text-navy hover:text-gold transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="19" y1="12" x2="5" y2="12" />
                        <polyline points="12 19 5 12 12 5" />
                    </svg>
                    Back to Admissions
                </a>
            </div>

        </div>
    </section>

@endsection
