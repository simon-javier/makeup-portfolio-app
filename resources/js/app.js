import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";
import Masonry from "masonry-layout"; // 1. Import Masonry directly
import imagesLoaded from "imagesloaded"; // 2. Import ImagesLoaded

Alpine.plugin(collapse);
Alpine.plugin(intersect);

Alpine.data("masonryGrid", () => ({
    msnry: null,

    init() {
        this.$nextTick(() => {
            // Masonry is guaranteed to exist now
            this.msnry = new Masonry(this.$el, {
                itemSelector: ".grid-item",
                columnWidth: ".grid-sizer",
                gutter: ".gutter-sizer",
                horizontalOrder: true,
                fitWidth: true,
            });

            // Recalculate layout every time a Cloudinary image finishes loading
            imagesLoaded(this.$el).on("progress", () => {
                this.msnry.layout();
            });
        });
    },

    relayout() {
        requestAnimationFrame(() => this.msnry?.layout());
    },
}));

Livewire.start();
