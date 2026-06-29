<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Booster Shot — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.05)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <livewire:admin.admin-topbar :title="$title ?? 'Create Booster Shot'" />

        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

                <livewire:admin.admin-sidebar :dashboard="false" :activeTarget="'booster_shots'" />

                <div class="lg:col-span-3">
            
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <input type="hidden" name="category" value="booster_shots">
                
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                    
                    <div class="lg:col-span-2 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/30 space-y-6">
                        
                        <div class="flex items-center gap-4 pb-5 border-b border-slate-800/60">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white tracking-tight">Booster Shots</h2>
                                <p class="text-xs text-slate-400 mt-0.5">Fill out the primary core details and descriptions of the service.</p>
                            </div>
                        </div>

                        <div class="prose prose-invert max-w-none space-y-4">
                            @include('livewire.admin.booster-shots._form')
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/30 space-y-4">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Publish Settings</h3>
                            
                            <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800/80 text-xs text-slate-400 backdrop-blur-md flex items-center gap-3">
                                Make sure all multi-language descriptions are completed before saving this asset to production.
                            </div>

                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-xs font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                    </svg>
                                    Publish Service
                                </button>
                                
                                <a href="{{ route('admin.services.index', ['category' => 'booster_shots']) }}" 
                                   class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3 text-xs font-semibold text-slate-400 backdrop-blur-sm transition-all duration-150 hover:bg-slate-900 hover:text-white">
                                    Cancel & Exit
                                </a>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-slate-800/50 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-5 text-xs text-slate-400 leading-relaxed">
                            <span class="block font-bold text-[#0EB3B9] uppercase font-mono mb-1.5">💡 Design Tip</span>
                            Images should ideally be 16:9 ratio with dark or transparent overlays to match the homepage carousel slider structure.
                        </div>
                    </div>

                </div>
            </form>

                    </div>
                </div>
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>