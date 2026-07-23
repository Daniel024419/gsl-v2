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

                <div class="flex items-center gap-5 mt-10 pt-8 border-t border-gray-200">
                    <a href="https://www.facebook.com/gslawofficial" target="_blank" rel="noopener noreferrer"
                        aria-label="Ghana School of Law on Facebook"
                        class="text-navy hover:text-gold transition-colors text-[20px]"><i class="bi bi-facebook"></i></a>
                    <a href="https://x.com/gslaw_official" target="_blank" rel="noopener noreferrer"
                        aria-label="Ghana School of Law on Twitter/X"
                        class="text-navy hover:text-gold transition-colors text-[20px]"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.youtube.com/@gslawofficial" target="_blank" rel="noopener noreferrer"
                        aria-label="Ghana School of Law on YouTube"
                        class="text-navy hover:text-gold transition-colors text-[20px]"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/gslaw_official/" target="_blank" rel="noopener noreferrer"
                        aria-label="Ghana School of Law on Instagram"
                        class="text-navy hover:text-gold transition-colors text-[20px]"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="lg:col-span-2 flex flex-col gap-5">
                <div class="p-5 rounded-xl bg-gray-50 border border-gray-200">
                    <p class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-3">General Enquiries</p>
                    <p class="text-[15px] text-gray-600 mb-0.5">(233) 307 003 231</p>
                    <p class="text-[15px] text-gray-600 mb-3">(233) 307 003 230</p>
                    <p class="text-[14px] text-gray-600 mb-0.5">admissions@gslaw.edu.gh</p>
                    <p class="text-[14px] text-gray-600 mb-0.5">enquiries@gslaw.edu.gh</p>
                    <p class="text-[14px] text-gray-600">postcall@gslaw.edu.gh</p>
                </div>

                <div>
                    <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-4">Other Campus Contacts</p>
                    @foreach ([['Kumasi Campus', 'ICIL Building', '+233 245 619 568', 'kumasicampus@gslaw.edu.gh'], ['Greenhill Campus', 'GIMPA Law Faculty', '+233 207 376 549', 'greenhillcampus@gslaw.edu.gh'], ['UPSA Campus', 'UPSA Campus', '+233 244 925 844', 'upsacampus@gslaw.edu.gh']] as $o)
                        <div class="mb-3 p-5 rounded-xl bg-gray-50 border border-gray-200">
                            <p class="text-[14px] font-bold text-gold mb-2">{{ $o[0] }}</p>
                            <p class="text-[14px] text-gray-600 leading-snug mb-0.5">{{ $o[1] }}</p>
                            <p class="text-[14px] text-gray-600 mb-0.5">{{ $o[2] }}</p>
                            <p class="text-[14px] text-gray-600">{{ $o[3] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- Map --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Find Us</p>
            <h2 class="font-serif font-semibold text-navy text-[30px] mb-8 text-center">Ghana School of Law, Makola
            </h2>
            <div class="rounded-xl overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.1403515878214!2d-0.2054207!3d5.546199199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9096014dfb45%3A0xeb8706d378993279!2sGhana%20School%20Of%20Law!5e0!3m2!1sen!2sgh!4v1761896613186!5m2!1sen!2sgh"
                    width="100%" height="420" style="border:0" allowfullscreen loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" title="Ghana School of Law location"></iframe>
            </div>
        </div>
    </section>

    {{-- Departmental Directory --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Directory</p>
            <h2 class="font-serif font-semibold text-navy text-[30px] mb-10 text-center">Departmental Directory</h2>
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-navy">
                        <tr>
                            <th class="p-4 text-[13px] font-bold text-white tracking-[1px] uppercase">Department/Unit
                            </th>
                            <th class="p-4 text-[13px] font-bold text-white tracking-[1px] uppercase">Email</th>
                            <th class="p-4 text-[13px] font-bold text-white tracking-[1px] uppercase">Phone Number
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['Accounts Office', 'bleaccounts@gslaw.edu.gh', '0201163170'], ['IT Office', 'it.support@gslaw.edu.gh', '0246006210'], ['Library', 'library@gslaw.edu.gh', ''], ['Records Office', 'records@gslaw.edu.gh', '0246941879'], ['Registry', 'registry@gslaw.edu.gh', '0307003231 / 0307003230 / 0553302485'], ['Student Affairs', 'studentaffairs@gslaw.edu.gh', '']] as $d)
                            <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors">
                                <td class="p-4 text-[14px] text-navy font-semibold">{{ $d[0] }}</td>
                                <td class="p-4 text-[14px] text-gray-600">{{ $d[1] }}</td>
                                <td class="p-4 text-[14px] text-gray-600">{{ $d[2] ?: '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
