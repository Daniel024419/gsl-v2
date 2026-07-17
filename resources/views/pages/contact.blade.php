@extends('layouts.app')
@section('title', 'Contact – Ghana School of Law')
@section('description',
    'Get in touch with the Ghana School of Law. Office addresses, phone numbers, email, and contact
    form.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Contact Us</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">Get in
                <span class='text-gold'>Touch</span>
            </h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Our admissions and enquiries teams are ready to help.
                Reach us by phone, email or visit any of our three campuses.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-12">

            <div class="lg:col-span-3">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Send a Message</p>
                <h2 class="font-serif font-semibold text-navy text-[28px] mb-6">We'd love to hear from you</h2>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-[13px] font-semibold text-gray-500 tracking-[1.5px] uppercase mb-2">First
                                Name</label>
                            <input type="text" name="first_name" required placeholder="Your first name"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-[15px] text-navy placeholder-gray-400 focus:outline-none focus:border-gold/60 transition-colors">
                        </div>
                        <div>
                            <label
                                class="block text-[13px] font-semibold text-gray-500 tracking-[1.5px] uppercase mb-2">Last
                                Name</label>
                            <input type="text" name="last_name" required placeholder="Your last name"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-[15px] text-navy placeholder-gray-400 focus:outline-none focus:border-gold/60 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-semibold text-gray-500 tracking-[1.5px] uppercase mb-2">Email
                            Address</label>
                        <input type="email" name="email" required placeholder="your@email.com"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-[15px] text-navy placeholder-gray-400 focus:outline-none focus:border-gold/60 transition-colors">
                    </div>
                    <div>
                        <label
                            class="block text-[13px] font-semibold text-gray-500 tracking-[1.5px] uppercase mb-2">Subject</label>
                        <select name="subject"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-[15px] text-navy/80 focus:outline-none focus:border-gold/60 transition-colors">
                            <option value="">Select a subject</option>
                            <option>Pre-Bar Course Enquiry</option>
                            <option>LPTC Admissions</option>
                            <option>Post-Call Law Course</option>
                            <option>Bar Exam Remedial Courses</option>
                            <option>General Enquiry</option>
                        </select>
                    </div>
                    <div>
                        <label
                            class="block text-[13px] font-semibold text-gray-500 tracking-[1.5px] uppercase mb-2">Message</label>
                        <textarea name="message" rows="5" required placeholder="How can we help you?"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg text-[15px] text-navy placeholder-gray-400 focus:outline-none focus:border-gold/60 transition-colors resize-none"></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3.5 text-[15px] font-semibold bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all">
                        Send Message
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="22" y1="2" x2="11" y2="13" />
                            <polygon points="22 2 15 22 11 13 2 9 22 2" />
                        </svg>
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 flex flex-col gap-5">
                <div>
                    <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-4">Our Offices</p>
                    @foreach ([['Accra (Main Campus)', 'Independence Avenue, Makola, Accra', '+233 307 003 231 / 30', 'enquiries@gslaw.edu.gh'], ['Kumasi Campus', 'KNUST Campus Area, Kumasi', '+233 322 000 000', 'kumasi@gslaw.edu.gh']] as $o)
                        <div class="mb-3 p-5 rounded-xl bg-gray-50 border border-gray-200">
                            <p class="text-[14px] font-bold text-gold mb-2">{{ $o[0] }}</p>
                            <p class="text-[14px] text-gray-600 leading-snug mb-0.5">{{ $o[1] }}</p>
                            <p class="text-[14px] text-gray-600 mb-0.5">{{ $o[2] }}</p>
                            <p class="text-[14px] text-gray-600">{{ $o[3] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="p-5 rounded-xl bg-gold/8 border border-gold/25">
                    <p class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-2">Admissions Hotline</p>
                    <p class="font-serif font-semibold text-navy text-[22px] mb-1">+233 246 006 210</p>
                    <p class="text-[14px] text-gray-600">Monday – Friday, 8:00am – 5:00pm</p>
                </div>
            </div>

        </div>
    </section>

@endsection
