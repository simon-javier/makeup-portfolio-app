<main>
    <section class="py-5 mt-15 lg:mt-25">
        <div class="wrapper">
            <div class="flex flex-col items-center justify-center gap-4 text-center">
                <p class="uppercase tracking-[3.6px] text-xs md:text-base text-accent max-w-xl">Atmospheric Porfolio</p>
                <h1 class="text-2xl xs:text-4xl md:text-5xl lg:text-6xl w-10/12 max-w-xl">The Art of Luminous
                    Transformation.</h1>
                <div
                    class="bg-radial-[at_50%_30%] -z-1 from-accent/15 from-0% to-accent/0 to-70% absolute inset-0 w-full h-full">
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="wrapper">
            <div class="grid mx-auto" x-data="masonryGrid()" x-init="init()" @image-loaded.window="relayout()">
                <div class="grid-sizer w-30 sm:w-40 md:w-50 lg:w-60"></div>
                <div class="gutter-sizer w-3 sm:w-4 md:w-5 lg:w-6"></div>
                @foreach ($this->images as $image)
                    <livewire:gallery.image :imageSrc="$image->img_url" :width="$image->width" :height="$image->height"
                        class="mb-3 sm:mb-4 md:mb-5 lg:mb-6" />
                @endforeach
            </div>
        </div>
    </section>
    <!-- Lightbox -->
    <div x-data="{
        open: false,
        src: '',
        close() {
            this.open = false;
            this.src = '';
        }
    }" @open-lightbox.window="
        src = $event.detail.src;
        open = true;
        "
        @keydown.escape.window="close()" x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center bg-black/90"
        style="display: none;" @click.self="close()">
        <!-- Close button -->
        <button @click="close()" class="absolute top-4 right-4 text-white/70 hover:text-white transition"
            aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Image -->
        <img :src="src" class="max-h-screen max-w-screen object-contain select-none" alt=""
            @click.stop>
    </div>
</main>
