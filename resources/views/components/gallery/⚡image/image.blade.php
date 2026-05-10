<div {{ $attributes->merge(['class' => 'grid-item w-30 sm:w-40 md:w-50 lg:w-60']) }}>
    <img {{-- Tiny transparent placeholder — no network request --}} src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
        data-src="{{ $imageSrc }}" {{-- Reserves the correct height before image loads,
             so Masonry can calculate layout immediately --}} width="{{ $width }}" height="{{ $height }}"
        class="w-full h-auto block opacity-0 transition-opacity duration-500" alt="" {{-- Only fires the network request when img enters viewport --}}
        x-intersect.once="$el.src = $el.dataset.src" {{-- After download completes, fade in + tell parent to relayout --}}
        @load="
            $el.classList.replace('opacity-0', 'opacity-100');
            $dispatch('image-loaded')
        ">
</div>
