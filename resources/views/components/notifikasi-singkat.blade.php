<!-- Native Alpine.js Toast Notification System -->
<style>
    @keyframes toastDrawPath {
        from { stroke-dashoffset: 100; }
        to { stroke-dashoffset: 0; }
    }
    .toast-draw-path {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: toastDrawPath 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        animation-delay: 0.15s;
    }
    @keyframes toastDrawCircle {
        from { stroke-dashoffset: 100; }
        to { stroke-dashoffset: 0; }
    }
    .toast-draw-circle {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: toastDrawCircle 0.4s ease-out forwards;
    }
</style>

<div x-data="toastNotification()" 
     @notify.window="add($event.detail)"
     class="fixed top-6 right-0 sm:right-6 z-[99999] flex flex-col gap-3 w-full max-w-[360px] pointer-events-none px-4 sm:px-0">
    
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.visible"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-12"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-12"
             class="pointer-events-auto bg-white/95 backdrop-blur-2xl border border-white/40 rounded-3xl p-4 sm:p-5 flex items-center gap-4 overflow-hidden relative transition-all duration-300"
             :class="toast.type === 'success' ? 'shadow-[0_20px_50px_-12px_rgba(183,217,177,0.5)]' : (toast.type === 'info' ? 'shadow-[0_20px_50px_-12px_rgba(59,130,246,0.3)]' : 'shadow-[0_20px_50px_-12px_rgba(239,68,68,0.3)]')">
            
            <!-- Progress Bar -->
            <div class="absolute bottom-0 left-0 h-1.5 bg-gray-50/50 w-full rounded-b-3xl overflow-hidden">
                <div class="h-full transition-all ease-linear"
                     :class="toast.type === 'success' ? 'bg-gradient-to-r from-primary-400 to-primary-600' : (toast.type === 'info' ? 'bg-gradient-to-r from-blue-400 to-blue-600' : 'bg-gradient-to-r from-red-400 to-red-600')"
                     :style="`width: ${toast.progress}%; transition-duration: ${toast.progress > 0 ? 50 : 0}ms`"></div>
            </div>

            <!-- Animated Icon -->
            <div class="flex-shrink-0">
                <template x-if="toast.type === 'success'">
                    <svg viewBox="0 0 100 100" class="w-12 h-12 text-primary-600 drop-shadow-sm">
                        <!-- Incomplete Circle -->
                        <path d="M 75,25 A 35,35 0 1,0 80,65" fill="none" stroke="currentColor" stroke-width="8" stroke-linecap="round" pathLength="100" class="toast-draw-circle" />
                        <!-- Checkmark -->
                        <path d="M 28,53 L 45,68 L 82,25" fill="none" stroke="currentColor" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" pathLength="100" class="toast-draw-path" />
                    </svg>
                </template>
                
                <template x-if="toast.type === 'error'">
                    <svg viewBox="0 0 100 100" class="w-12 h-12 text-red-500 drop-shadow-sm">
                        <!-- Full Circle -->
                        <circle cx="50" cy="50" r="35" fill="none" stroke="currentColor" stroke-width="8" stroke-linecap="round" pathLength="100" class="toast-draw-circle opacity-30"></circle>
                        <!-- Cross Lines -->
                        <path d="M 35,35 L 65,65" fill="none" stroke="currentColor" stroke-width="10" stroke-linecap="round" pathLength="100" class="toast-draw-path" />
                        <path d="M 65,35 L 35,65" fill="none" stroke="currentColor" stroke-width="10" stroke-linecap="round" pathLength="100" style="animation-delay: 0.25s;" class="toast-draw-path" />
                    </svg>
                </template>

                <template x-if="toast.type === 'info'">
                    <svg viewBox="0 0 100 100" class="w-12 h-12 text-blue-500 drop-shadow-sm">
                        <circle cx="50" cy="50" r="35" fill="none" stroke="currentColor" stroke-width="8" stroke-linecap="round" pathLength="100" class="toast-draw-circle"></circle>
                        <path d="M 50,30 L 50,55" fill="none" stroke="currentColor" stroke-width="8" stroke-linecap="round" class="toast-draw-path" />
                        <circle cx="50" cy="70" r="4" fill="currentColor"></circle>
                    </svg>
                </template>
            </div>

            <!-- Content -->
            <div class="flex flex-col items-start text-left w-full">
                <h4 class="text-lg font-extrabold font-heading m-0 tracking-tight"
                    :class="toast.type === 'success' ? 'text-primary-600' : (toast.type === 'info' ? 'text-blue-600' : 'text-red-500')"
                    x-text="toast.title"></h4>
                <p class="text-sm text-gray-500 font-medium mt-0.5 leading-relaxed" x-text="toast.text"></p>
            </div>
        </div>
    </template>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('toastNotification', () => ({
            toasts: [],
            lastPollTime: {{ now()->timestamp }}, // Waktu inisialisasi dari server
            init() {
                const saved = localStorage.getItem('persisted_toasts');
                if (saved) {
                    try {
                        const parsed = JSON.parse(saved);
                        parsed.forEach(t => {
                            if (t.remaining > 500) {
                                this.add({ type: t.type, title: t.title, text: t.text, duration: t.remaining, recovered: true, progressPercentage: t.progress });
                            }
                        });
                    } catch(e) {}
                    localStorage.removeItem('persisted_toasts');
                }

                window.addEventListener('beforeunload', () => {
                    const activeToasts = this.toasts.filter(t => t.progress > 0 && t.visible).map(t => ({
                        type: t.type,
                        title: t.title,
                        text: t.text,
                        remaining: (t.progress / 100) * t.originalDuration,
                        progress: t.progress
                    }));
                    if (activeToasts.length > 0) {
                        localStorage.setItem('persisted_toasts', JSON.stringify(activeToasts));
                    }
                });

                // Start AJAX Polling
                this.startPolling();
            },
            startPolling() {
                setInterval(async () => {
                    try {
                        const response = await fetch('/api/notifications/poll?last_poll=' + this.lastPollTime, {
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        if (response.ok) {
                            const data = await response.json();
                            if (data.notifications && data.notifications.length > 0) {
                                data.notifications.forEach(notif => {
                                    this.add({ type: notif.type, title: notif.title, text: notif.text, duration: 8000 });
                                });
                            }
                            if (data.timestamp) {
                                this.lastPollTime = data.timestamp;
                            }
                        }
                    } catch(e) {
                        console.error('Polling failed:', e);
                    }
                }, 15000); // 15 detik
            },
            add(toast) {
                const id = Date.now() + Math.floor(Math.random() * 1000);
                const duration = toast.duration || 4500;
                const isRecovered = toast.recovered === true;
                const initialProgress = toast.progressPercentage !== undefined ? toast.progressPercentage : 100;
                
                const newToast = { id, ...toast, visible: isRecovered, progress: initialProgress, originalDuration: duration };
                this.toasts.push(newToast);
                
                if (!isRecovered) {
                    setTimeout(() => {
                        const t = this.toasts.find(t => t.id === id);
                        if(t) t.visible = true;
                    }, 10);
                }

                const interval = 50;
                const steps = duration / interval;
                const stepAmount = 100 / steps;
                
                const timer = setInterval(() => {
                    const t = this.toasts.find(t => t.id === id);
                    if(t && t.progress > 0) {
                        t.progress = Math.max(0, t.progress - stepAmount);
                    } else {
                        clearInterval(timer);
                    }
                }, interval);

                setTimeout(() => {
                    const t = this.toasts.find(t => t.id === id);
                    if (t) {
                        t.visible = false;
                        setTimeout(() => {
                            this.toasts = this.toasts.filter(t => t.id !== id);
                        }, 400); 
                    }
                }, duration);
            }
        }));
    });

    // Intercept Laravel Sessions to Trigger Alpine Toast
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('success'))
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent('notify', {
                    detail: { type: 'success', title: '✨ Yeaayy, Sukses!', text: @js(session('success')), duration: 4500 }
                }));
            }, 300);
        @endif

        {{-- 
        @if($errors->any())
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent('notify', {
                    detail: { type: 'error', title: '💥 Oops, Validasi Gagal!', text: @js($errors->first()), duration: 5000 }
                }));
            }, 300);
        @endif
        --}}

        @if(session('error'))
            setTimeout(() => {
                window.dispatchEvent(new CustomEvent('notify', {
                    detail: { type: 'error', title: '🚨 Yahh, Terjadi Kesalahan!', text: @js(session('error')), duration: 5000 }
                }));
            }, 300);
        @endif
    });
</script>
