import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";

Alpine.plugin(collapse);
Alpine.plugin(intersect);

Alpine.data("masonryGrid", () => ({
    msnry: null,

    init() {
        this.$nextTick(() => {
            this.msnry = new Masonry(this.$el, {
                itemSelector: ".grid-item",
                columnWidth: ".grid-sizer",
                gutter: ".gutter-sizer",
                horizontalOrder: true,
                fitWidth: true,
            });
        });
    },

    relayout() {
        requestAnimationFrame(() => this.msnry?.layout());
    },
}));

Livewire.start(); // ← starts both Livewire AND Alpine together
