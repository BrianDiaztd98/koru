<section class="relative bg-slate-900 py-24 overflow-hidden" 
    wire:ignore
    x-data="{ 
        open: false, 
        activeVideoUrl: '', 
        isPortrait: false,
        setVideo(url){
            this.activeVideoUrl = url;
            this.open = true;
            this.isPortrait = false;
            
            if(url && url.includes('.mp4')){
                const v = document.createElement('video');
                v.preload = 'metadata';
                v.src = url;
                v.onloadedmetadata = () => {
                    this.isPortrait = v.videoHeight > v.videoWidth;
                    v.remove();
                };
                setTimeout(()=>{ try{ v.remove() }catch(e){} }, 3000);
            } else {
                // Si la URL contiene parámetros comunes de videos verticales (Shorts o Reels)
                if(url && (url.includes('shorts') || url.includes('reel'))) {
                    this.isPortrait = true;
                } else {
                    this.isPortrait = false;
                }
            }
        },
        closeVideo() {
            this.open = false;
            // Forzamos un pequeño retraso para limpiar la URL justo después de que la animación de salida termine
            setTimeout(() => { 
                this.activeVideoUrl = ''; 
            }, 200);
        }
    }"
    x-on:open-video-modal.window="setVideo($event.detail)" 
    x-on:keydown.escape.window="closeVideo()">
    
    <!-- Luces ambientales de fondo clínicas -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Bloque de Invitación Central (Call to Action) -->
        <div class="rounded-[2.5rem] border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm p-10 text-center shadow-xl max-w-4xl mx-auto transition-all duration-300 hover:border-[#0EB3B9]/20">
            <div class="inline-flex items-center justify-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Experience Koru
            </div>
            
            <h2 class="mt-6 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                A new standard for massage, wellness, and recovery.
            </h2>
            
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-slate-400">
                Watch our clinic tour and discover how Koru blends clinical sports science with comfort-focused care.
            </p>
            
            <div class="mt-8 flex justify-center">
                <button type="button" 
                        class="inline-flex items-center gap-3 rounded-xl bg-[#0EB3B9] px-6 py-3.5 text-sm font-bold text-white shadow-md transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0EB3B9]/20 hover:shadow-lg active:scale-[0.98]" 
                        @click="$dispatch('open-video-modal', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&rel=0')">
                    <span>Watch the tour</span>
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M14.752 11.168l-5.197-3.023A1 1 0 008 9.003v5.994a1 1 0 001.555.832l5.197-3.023a1 1 0 000-1.664z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL DE VIDEO GLOBAL (Overlay) -->
    <div x-show="open" 
         x-cloak 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/90 backdrop-blur-md px-4 py-6"
         @click.self="closeVideo()">
        
        <!-- Contenedor del Reproductor Premium -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="relative w-full max-w-4xl overflow-hidden rounded-3xl border border-slate-800/60 bg-slate-950 shadow-2xl transition-all duration-300 dynamic-modal-container" 
             :class="isPortrait ? 'max-w-md' : 'max-w-4xl'">
            
            <!-- Botón de Cerrar Flotante Quirúrgico -->
            <button @click="closeVideo()" 
                    class="absolute right-4 top-4 z-50 rounded-xl bg-slate-900/80 border border-slate-800 p-2.5 text-slate-400 transition-all hover:bg-slate-800 hover:text-white focus:outline-none backdrop-blur-sm">
                <span class="sr-only">Close video</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Ventana de Renderizado de Video -->
            <div class="bg-slate-950 flex items-center justify-center" style="max-height:calc(100vh - 120px);">
                <template x-if="activeVideoUrl">
                    <div class="w-full h-full flex items-center justify-center">
                        <!-- Caso 1: Video MP4 Nativo -->
                        <template x-if="activeVideoUrl.includes('.mp4')">
                            <video x-bind:src="activeVideoUrl" 
                                   :class="isPortrait ? 'w-full h-auto max-h-[75vh]' : 'w-full aspect-video'"
                                   class="bg-slate-950 block" 
                                   controls 
                                   autoplay 
                                   playsinline></video>
                        </template>
                        
                        <!-- Caso 2: Embebido Externo (YouTube / Vimeo) -->
                        <template x-if="!activeVideoUrl.includes('.mp4')">
                            <div class="w-full" :class="isPortrait ? 'aspect-[9/16]' : 'aspect-video'">
                                <iframe x-bind:src="activeVideoUrl" 
                                        class="w-full h-full bg-slate-950 block" 
                                        title="Koru Center video" 
                                        frameborder="0" 
                                        allowfullscreen 
                                        allow="autoplay; encrypted-media"></iframe>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>