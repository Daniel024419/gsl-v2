@extends('layouts.app')
@section('title', $page->title.' – Ghana School of Law')
@section('description', $page->meta_description ?? '')
@section('content')
@use(Illuminate\Support\HtmlString)

    {{-- ══ PAGE HERO ═══════════════════════════════════════════════════ --}}
    <section class="max-w-4xl mx-auto px-[5%] pt-[97px] md:pt-[133px] pb-16">
        <h1 class="font-serif font-semibold text-white leading-[1.2] max-w-3xl"
            style="font-size:clamp(28px,4vw,48px)">
            {{ $page->title }}
        </h1>
    </section>

    {{-- ══ PAGE CONTENT ════════════════════════════════════════════════ --}}
    <section class="bg-white">
        <div class="max-w-4xl mx-auto px-[5%] py-16
            text-[16px] text-gray-600 leading-[1.85]
            [&_h1]:font-serif [&_h1]:font-semibold [&_h1]:text-navy [&_h1]:text-[28px] [&_h1]:mb-4 [&_h1]:mt-8
            [&_h2]:font-serif [&_h2]:font-semibold [&_h2]:text-navy [&_h2]:text-[22px] [&_h2]:mb-3 [&_h2]:mt-8
            [&_h3]:font-serif [&_h3]:font-semibold [&_h3]:text-navy [&_h3]:text-[18px] [&_h3]:mb-2 [&_h3]:mt-6
            [&_p]:mb-5
            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-5 [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-5
            [&_a]:text-gold [&_a]:underline [&_a]:hover:text-gold-light
            [&_strong]:text-navy [&_strong]:font-semibold">
            <div class="prose dark:prose-invert">
                {{ \Filament\Forms\Components\RichEditor\RichContentRenderer::make(new HtmlString($page->content))
                    ->fileAttachmentsDisk(config('filesystems.disks.r2.disk'))
                    ->fileAttachmentsVisibility('private') }}
            </div>
        </div>
    </section>

@endsection
