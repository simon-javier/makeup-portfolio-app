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
</main>
@vite('resources/js/masonry.pkgd.min.js')
