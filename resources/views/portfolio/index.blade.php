@extends('layouts.app')

@section('title', $personal['name'] . ' — ' . $personal['title'])

@section('content')
    {{-- Navbar --}}
    <header id="navbar"
        class="fixed top-0 left-0 right-0 z-[9999] w-full transition-all duration-300">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 md:py-5">
            <a href="#hero" class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-tr from-emerald-500 to-sky-500 shadow-glow">
                    <span class="text-lg font-semibold tracking-widest text-white">SR</span>
                </div>
                <div class="hidden flex-col text-sm leading-tight sm:flex">
                    <span class="font-medium text-slate-100">{{ $personal['name'] }}</span>
                    <span class="text-xs text-slate-400">{{ $personal['title'] }}</span>
                </div>
            </a>

            <button id="nav-toggle" class="inline-flex items-center justify-center rounded-md p-2 text-slate-300 md:hidden"
                aria-label="Toggle navigation">
                <span class="sr-only">Open main menu</span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>

            <div id="nav-menu"
                class="nav-menu absolute inset-x-4 top-full mt-2 origin-top rounded-2xl border border-white/10 bg-[#0a0f1e]/98 p-4 backdrop-blur-xl shadow-2xl md:static md:mt-0 md:flex md:w-auto md:scale-100 md:flex-row md:items-center md:gap-6 md:border-0 md:bg-transparent md:p-0 md:backdrop-blur-none">
                <a href="#about" class="nav-link">About</a>
                <a href="#skills" class="nav-link">Skills</a>
                <a href="#experience" class="nav-link">Experience</a>
                <a href="#projects" class="nav-link">Projects</a>
                <a href="#contact" class="nav-link">Contact</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-6xl px-4 pt-20">
        {{-- Hero --}}
        <section id="hero"
        class="section fade-section flex flex-col items-center justify-center gap-5 md:flex-row md:gap-5">
            <div class="flex-1 space-y-6">
                <p class="text-sm font-medium uppercase tracking-[0.2em] text-emerald-300/80">Hi, I'm</p>

                <h1 class="text-balance text-4xl font-extrabold tracking-tight text-slate-100 sm:text-5xl md:text-6xl">
                    <span
                        class="bg-gradient-to-r from-primary-500 via-emerald-400 to-accent-500 bg-clip-text text-transparent">
                        {{ $personal['name'] }}
                    </span>
                </h1>

                <div class="h-7 overflow-hidden text-lg font-medium text-slate-300 md:text-xl">
                    <span id="typing-label" class="text-emerald-300"></span>
                    <span class="ml-1 text-slate-500">|</span>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900/60 px-3 py-1 text-xs font-medium text-slate-300 backdrop-blur-md">
                        <span>📍</span>
                        <span>{{ $personal['location'] }}</span>
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-emerald-500/40 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-200 backdrop-blur-md">
                        <span>💼</span>
                        <span>{{ $personal['experience_years'] }} Experience</span>
                    </span>
                </div>

                <p class="max-w-xl text-balance text-sm leading-relaxed text-slate-400 md:text-base">
                    {{ $aboutSummary }}
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="#projects"
                        class="group inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-primary-500 to-accent-500 px-6 py-2.5 text-sm font-semibold text-white shadow-glow hover:shadow-glow-strong focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        <span>View My Work</span>
                        <span
                            class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-white/10 text-xs group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-150">
                            →
                        </span>
                    </a>

                    <a href="{{ asset('Sandip-Ramanuj-Resume.pdf') }}" download
                        class="inline-flex items-center gap-2 rounded-full border border-slate-700 bg-slate-900/40 px-6 py-2.5 text-sm font-semibold text-slate-100 hover:border-primary-400 hover:bg-slate-900/80 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        <span>Download Resume</span>
                    </a>
                </div>

                <div class="mt-6 flex flex-wrap items-center gap-3 text-xs text-slate-400">
                    <span class="text-slate-500">Tech I work with:</span>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['PHP', 'Laravel', 'MySQL', 'REST API'] as $tag)
                            <span
                                class="inline-flex items-center rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-medium text-slate-300 ring-1 ring-slate-700/70 shadow-sm">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex-1">
                <div
                    class="relative mx-auto flex aspect-square max-h-80 max-w-xs items-center justify-center rounded-full border border-white/10 bg-gradient-to-b from-white/5 to-transparent p-1 shadow-[0_0_40px_rgba(16,185,129,0.2)] backdrop-blur-xl">
                    <div
                        class="relative flex h-full w-full items-center justify-center overflow-hidden rounded-full border border-slate-700/60 bg-gradient-to-b from-slate-900/50 to-slate-950/80 shadow-inner">
                        @php
                            $profilePath = public_path('images/profile.jpg');
                        @endphp

                        @if (file_exists($profilePath))
                            <img src="{{ asset('images/profile.jpg') }}" alt="{{ $personal['name'] }} profile photo"
                                class="h-full w-full object-cover">
                        @else
                            <div
                                class="flex h-full w-full flex-col items-center justify-center gap-2 bg-gradient-to-br from-slate-900 to-slate-950">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-tr from-primary-500 to-accent-500 text-3xl font-semibold text-white shadow-glow">
                                    SR
                                </div>
                                <p class="px-6 text-center text-xs text-slate-400">
                                    Profile photo placeholder. Add your image at
                                    <span class="font-medium text-slate-300">public/images/profile.jpg</span>.
                                </p>
                            </div>
                        @endif
                    </div>

                    <div class="pointer-events-none absolute inset-0">
                        <div
                            class="floating-tag left-1/2 top-3 inline-flex -translate-x-1/2 items-center gap-1 rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-medium text-slate-200 shadow-sm ring-1 ring-primary-500/40">
                            <span class="h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                            <span>Laravel Developer</span>
                        </div>
                        <div
                            class="floating-tag right-0 top-1/3 inline-flex translate-x-3 items-center gap-1 rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-medium text-slate-200 shadow-sm ring-1 ring-accent-500/40">
                            <span class="h-1.5 w-1.5 rounded-full bg-accent-400"></span>
                            <span>Backend Engineer</span>
                        </div>
                        <div
                            class="floating-tag bottom-6 left-1/2 inline-flex -translate-x-1/2 items-center gap-1 rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-medium text-slate-200 shadow-sm ring-1 ring-primary-500/40">
                            <span class="h-1.5 w-1.5 rounded-full bg-primary-400"></span>
                            <span>API Specialist</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- About --}}
        <section id="about" class="section fade-section">
            <div class="section-header">
                <h2 class="section-title">About Me</h2>
                <p class="section-subtitle">Laravel Developer based in Ahmedabad, focused on clean, scalable backend
                    systems.</p>
            </div>

            <div class="grid gap-5 md:grid-cols-[2fr,1fr] md:items-center">
                <div
                    class="glass-card relative overflow-hidden border border-slate-800/80 bg-slate-900/60 p-6 shadow-xl">
                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-br from-primary-500/10 via-transparent to-accent-500/5 opacity-80">
                    </div>
                    <p class="relative text-sm leading-relaxed text-slate-300 md:text-[15px]">
                        {{ $aboutSummary }}
                    </p>
                </div>

                <div class="grid gap-4">
                    @foreach ($stats as $stat)
                        <div
                            class="glass-card border border-white/10 p-4 flex items-center gap-3">
                            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex-shrink-0">
                                @if ($stat['label'] === 'Years Experience')
                                    <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 7v5l3 2" />
                                    </svg>
                                @elseif ($stat['label'] === 'Companies')
                                    <svg class="h-5 w-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 21V9l9-6 9 6v12" />
                                        <path d="M9 21V12h6v9" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 18l6-3-6-3" />
                                        <path d="M8 6L2 9l6 3" />
                                        <path d="M8 6l8 4.5L8 15" />
                                        <path d="M16 6l-4-2-4 2" />
                                        <path d="M4 15l4 2 4-2" />
                                    </svg>
                                @endif
                            </span>
                            <div>
                                <p class="text-xl font-bold text-emerald-300">{{ $stat['value'] }}</p>
                                <p class="text-xs text-slate-500 uppercase tracking-wide">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Skills --}}
        <section id="skills" class="section fade-section">
            <div class="section-header">
                <h2 class="section-title">Technical Skills</h2>
                <p class="section-subtitle">A focused stack for building robust Laravel backends and modern web
                    experiences.</p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                @foreach ($skills as $group => $items)
                    <div class="glass-card border border-slate-800/80 bg-slate-900/60 p-5 shadow-md">
                        <h3 class="mb-3 text-sm font-semibold tracking-wide text-slate-200 border-l-2 border-emerald-500/60 pl-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($items as $skill)
                                <span
                                    class="skill-pill inline-flex items-center rounded-md border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-300 hover:border-emerald-500/50 hover:bg-emerald-500/10 hover:text-emerald-300">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Experience --}}
        <section id="experience" class="section fade-section">
            <div class="section-header">
                <h2 class="section-title">Experience</h2>
                <p class="section-subtitle">Hands-on experience delivering production-grade Laravel applications and
                    internal tools.</p>
            </div>

            <div class="relative border-l border-slate-800/80 pl-6 md:pl-8">
                <div
                    class="pointer-events-none absolute left-[-1px] top-0 h-full w-[2px] bg-gradient-to-b from-primary-500/70 via-slate-700/40 to-transparent">
                </div>

                <div class="space-y-6">
                    @foreach ($experience as $index => $job)
                        <article
                            class="timeline-card relative ml-[-0.2rem] flex flex-col gap-3 rounded-2xl border border-slate-800/80 bg-slate-900/70 p-6 shadow-xl backdrop-blur-xl">
                            <div
                                class="absolute -left-9 top-6 flex h-7 w-7 items-center justify-center rounded-full border border-slate-700 bg-slate-900 shadow-sm">
                                <div
                                    class="h-2.5 w-2.5 rounded-full bg-gradient-to-tr from-emerald-400 to-sky-400 shadow-[0_0_10px_rgba(16,185,129,0.7)]">
                                </div>
                            </div>

                            <header class="flex flex-wrap items-center justify-between gap-2">
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-100 md:text-base">
                                        {{ $job['role'] }} ·
                                        <span class="text-primary-300">{{ $job['company'] }}</span>
                                    </h3>
                                    <p class="text-xs text-slate-400 md:text-[13px]">{{ $job['duration'] }}</p>
                                </div>
                                <span
                                    class="inline-flex rounded-full bg-slate-900/80 px-3 py-1 text-[11px] font-medium text-slate-300 ring-1 ring-slate-700/70">
                                    {{ $index === 0 ? 'Past Role' : 'Current Role' }}
                                </span>
                            </header>

                            <div class="mt-3 space-y-4 text-[13px] leading-relaxed text-slate-300">
                                @foreach ($job['projects'] as $project)
                                    <div class="mt-4">
                                        <p class="mb-2 font-semibold text-slate-100">
                                            <span class="inline-block h-2 w-2 rounded-full bg-emerald-400 mr-2 align-middle flex-shrink-0"></span>{{ $project['name'] }}
                                        </p>
                                        <ul class="ml-4 list-disc space-y-2 text-slate-300">
                                            @foreach ($project['highlights'] as $highlight)
                                                <li>{{ $highlight }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Education --}}
        <section id="education" class="section fade-section">
            <div class="section-header">
                <h2 class="section-title">Education</h2>
                <p class="section-subtitle">Commerce background with a strong focus on analytical and accounting
                    fundamentals.</p>
            </div>

            <div
                class="glass-card mx-auto max-w-md rounded-2xl p-6 shadow-md">
                <div class="flex items-start gap-4">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-sky-500/10 border border-sky-500/20 text-sky-400 flex-shrink-0 mt-1">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19V5a2 2 0 0 1 2-2h8" />
                            <path d="M16 3v4H8" />
                            <path d="M18 21a3 3 0 0 0 3-3v-8h-7v8a3 3 0 0 0 3 3Z" />
                            <path d="M13 11h7" />
                        </svg>
                    </span>
                    <div class="flex flex-col gap-1">
                        <p class="text-[11px] uppercase tracking-widest text-slate-500">{{ $education['college'] }}</p>
                        <h3 class="text-base font-semibold text-slate-100">{{ $education['degree'] }}</h3>
                        <p class="text-xs text-slate-400">{{ $education['duration'] }}</p>
                        <span class="mt-1 inline-flex w-fit items-center rounded-full bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 text-[11px] text-emerald-300">55.70%</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Projects --}}
        <section id="projects" class="section fade-section">
            <div class="section-header">
                <h2 class="section-title">Projects</h2>
                <p class="section-subtitle">Selected projects that highlight backend problem-solving and system design.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <article
                        class="project-card group flex flex-col rounded-2xl border border-slate-800/90 bg-slate-900/70 p-5 shadow-xl backdrop-blur-xl transition-transform duration-200">
                        <header class="mb-3 flex items-start justify-between gap-2">
                            <h3 class="text-sm font-semibold text-slate-100 md:text-[15px]">
                                {{ $project['name'] }}
                            </h3>
                            <span
                                class="inline-flex rounded-full bg-slate-900/80 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-emerald-300 ring-1 ring-emerald-500/40">
                                Featured
                            </span>
                        </header>

                        <p class="mb-3 text-[13px] leading-relaxed text-slate-300">
                            {{ $project['description'] }}
                        </p>

                        <div class="mt-auto flex flex-wrap gap-2">
                            @foreach ($project['stack'] as $tag)
                                <span
                                    class="inline-flex items-center rounded-full bg-slate-900/90 px-2.5 py-1 text-[11px] font-medium text-slate-200 ring-1 ring-slate-700/80 group-hover:ring-primary-400/80">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="section fade-section relative">
            <div class="pointer-events-none absolute inset-0 flex items-start justify-center">
                <div class="contact-glow opacity-20"></div>
            </div>

            <div class="section-header text-center relative">
                <h2 class="section-title">Let's Work Together</h2>
                <p class="section-subtitle max-w-xl mx-auto">
                    Open to new opportunities, freelance collaborations, and interesting backend problems around Laravel
                    and automation.
                </p>
            </div>

            <div class="relative glass-card contact-card max-w-lg shadow-xl p-8">
                <div class="flex flex-col items-center gap-3 text-center">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-emerald-500/40 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-100">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span>Available for opportunities</span>
                    </span>
                </div>

                <div class="mt-5 flex flex-col gap-3 w-full">
                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex-shrink-0">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="M3 7l9 6 9-6" />
                            </svg>
                        </span>
                        <span>{{ $personal['email'] }}</span>
                    </div>

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex-shrink-0">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1.03-.24 11.4 11.4 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h2.5a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .57 3.57 1 1 0 0 1-.25 1.03z" />
                            </svg>
                        </span>
                        <span>{{ $personal['phone'] }}</span>
                    </div>

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex-shrink-0">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 21s-6-5.5-6-10a6 6 0 1 1 12 0c0 4.5-6 10-6 10z" />
                                <circle cx="12" cy="11" r="2.5" />
                            </svg>
                        </span>
                        <span>{{ $personal['location'] }}</span>
                    </div>

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex-shrink-0">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M8.34 17V10.5H6.16V17H8.34M7.25 9.5A1.25 1.25 0 1 0 7.25 7A1.25 1.25 0 0 0 7.25 9.5M18 17V13.3C18 11.46 17.04 10.4 15.45 10.4C14.39 10.4 13.82 10.98 13.5 11.5V10.5H11.32V17H13.5V13.72C13.5 12.76 13.86 12.03 14.76 12.03C15.64 12.03 15.95 12.68 15.95 13.72V17H18Z" />
                            </svg>
                        </span>
                        <span>linkedin.com/in/sandip-ramanuj-a5a45b302</span>
                    </div>
                </div>

                <div class="mt-6 w-full h-px bg-white/5"></div>

                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <a href="{{ $contacts['email'] }}"
                        class="contact-btn inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-primary-500 to-accent-500 px-5 py-2.5 text-sm font-semibold text-white shadow-glow hover:shadow-glow-strong">
                        <span>📧</span>
                        <span>Email Me</span>
                    </a>

                    <a href="{{ $contacts['whatsapp'] }}" target="_blank" rel="noreferrer"
                        class="contact-btn inline-flex items-center gap-2 rounded-full border border-emerald-400/50 bg-emerald-500/10 px-5 py-2.5 text-sm font-semibold text-emerald-100 hover:border-emerald-300 hover:bg-emerald-500/20">
                        <span>💬</span>
                        <span>WhatsApp</span>
                    </a>

                    <a href="{{ $contacts['linkedin'] }}" target="_blank" rel="noreferrer"
                        class="contact-btn inline-flex items-center gap-2 rounded-full border border-sky-400/60 bg-sky-500/10 px-5 py-2.5 text-sm font-semibold text-sky-200 hover:border-sky-300 hover:bg-sky-500/20">
                        <span>🔗</span>
                        <span>LinkedIn</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="border-t border-white/5 pt-8 pb-8">
            <div class="flex flex-col items-center justify-between gap-4 text-xs text-slate-500 md:flex-row">
                <p>
                    Designed &amp; Built by
                    <span class="font-medium text-slate-300">{{ $personal['name'] }}</span> ·
                    <span class="text-slate-400">2026</span>
                </p>

                <div class="flex items-center gap-4">
                    @if ($social['linkedin'])
                        <a href="{{ $social['linkedin'] }}" target="_blank" rel="noreferrer"
                            class="footer-icon-link group" aria-label="LinkedIn">
                            <span class="sr-only">LinkedIn</span>
                            <svg viewBox="0 0 24 24" class="h-4 w-4 text-slate-400 group-hover:text-primary-300">
                                <path fill="currentColor"
                                    d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M8.34 17V10.5H6.16V17H8.34M7.25 9.5A1.25 1.25 0 1 0 7.25 7A1.25 1.25 0 0 0 7.25 9.5M18 17V13.3C18 11.46 17.04 10.4 15.45 10.4C14.39 10.4 13.82 10.98 13.5 11.5V10.5H11.32V17H13.5V13.72C13.5 12.76 13.86 12.03 14.76 12.03C15.64 12.03 15.95 12.68 15.95 13.72V17H18Z" />
                            </svg>
                        </a>
                    @endif

                    @if ($social['github'])
                        <a href="{{ $social['github'] }}" target="_blank" rel="noreferrer"
                            class="footer-icon-link group" aria-label="GitHub">
                            <span class="sr-only">GitHub</span>
                            <svg viewBox="0 0 24 24" class="h-4 w-4 text-slate-400 group-hover:text-primary-300">
                                <path fill="currentColor"
                                    d="M12 2C6.47 2 2 6.58 2 12.26C2 16.59 4.87 20.23 8.84 21.5C9.34 21.59 9.52 21.27 9.52 21C9.52 20.76 9.51 20.14 9.5 19.31C6.73 19.93 6.14 17.75 6.14 17.75C5.68 16.56 5.03 16.24 5.03 16.24C4.12 15.62 5.1 15.64 5.1 15.64C6.1 15.71 6.63 16.76 6.63 16.76C7.5 18.38 8.97 17.91 9.56 17.65C9.65 17 9.9 16.57 10.17 16.33C7.95 16.09 5.62 15.17 5.62 11.5C5.62 10.39 6 9.5 6.65 8.79C6.55 8.55 6.2 7.5 6.75 6.15C6.75 6.15 7.59 5.89 9.5 7.17C10.29 6.95 11.15 6.84 12 6.84C12.85 6.84 13.71 6.95 14.5 7.17C16.41 5.89 17.25 6.15 17.25 6.15C17.8 7.5 17.45 8.55 17.35 8.79C18 9.5 18.38 10.39 18.38 11.5C18.38 15.18 16.04 16.09 13.81 16.33C14.16 16.64 14.47 17.24 14.47 18.15C14.47 19.42 14.46 20.58 14.46 21C14.46 21.27 14.64 21.59 15.14 21.5C19.11 20.23 22 16.59 22 12.26C22 6.58 17.52 2 12 2Z" />
                            </svg>
                        </a>
                    @endif

                    <a href="{{ $social['email'] }}" class="footer-icon-link group" aria-label="Email">
                        <span class="sr-only">Email</span>
                        <svg viewBox="0 0 24 24" class="h-4 w-4 text-slate-400 group-hover:text-primary-300">
                            <path fill="currentColor"
                                d="M20 4H4C2.9 4 2 4.9 2 6V18C2 19.11 2.9 20 4 20H20C21.11 20 22 19.11 22 18V6C22 4.9 21.11 4 20 4M20 8L12 13L4 8V6L12 11L20 6" />
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </main>
@endsection

