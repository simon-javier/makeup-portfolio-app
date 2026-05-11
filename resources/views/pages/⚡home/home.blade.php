<main class="relative inset-0 min-h-dvh">
    <section class="h-dvh">
        <img src="{{ asset('images/hero_img.png') }}"
            class=" -z-100 w-full absolute h-full grayscale inset-0 object-[50%_40%] object-cover" alt="">
        <div class="absolute inset-0 bg-radial-[at_0%_100%] from-primary/40 to-dark/80 -z-99"></div>
        <div class="flex flex-col items-center h-full justify-center text-center gap-2 wrapper">
            <h1 class="text-5xl sm:text-6xl md:text-7xl xl:text-8xl w-10/12 max-w-xl">THE ART OF RADIANCE</h1>
            <p class="font-light md:text-lg xl:text-xl text-balance max-w-xl">Elevating beauty through precision and
                passion.
                A bespoke experience tailored for bridal, editorial, and high-fashion excellence.</p>
            <div class="flex flex-col justify-center gap-4 md:gap-8 sm:flex-row mt-12 sm:mt-2 lg:mt-8">
                <a href="https://www.facebook.com/ahzalea0777"
                    class="uppercase tracking-[1.2px] px-10 py-4 font-semibold bg-accent hover:bg-[#F5D9FF] transition-colors duration-300 text-tertiary">Book
                    a Session</a>
                <a href="{{ route('gallery') }}"
                    class="uppercase tracking-[1.2px] px-10 py-4 font-semibold border-2 border-accent/30 btn-animation after:bg-white after:outline-white after:outline-2 gallery-btn">View
                    Gallery</a>
            </div>
        </div>
    </section>
</main>
