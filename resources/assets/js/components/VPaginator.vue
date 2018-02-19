<script>
export default {
    props: {
        meta: {
            type: Object
        },
        numberPerSection: {
            type: Number,
            default: 7
        }
    },
    computed: {
        currentSection() {
            return Math.ceil(this.meta.current_page / this.numberPerSection);
        },
        totalSections() {
            return Math.ceil(this.meta.last_page / this.numberPerSection);
        },
        pages() {
            let pages =
                this.currentSection !== this.totalSections
                    ? this.numberPerSection
                    : this.meta.last_page -
                      this.numberPerSection * (this.currentSection - 1);

            return Array.from(
                Array(pages),
                (_, i) =>
                    (this.currentSection - 1) * this.numberPerSection + i + 1
            );
        },
        sections() {
            let showPrev = this.currentSection > 1;
            let showNext = this.currentSection < this.totalSections;

            return {
                showNext,
                showPrev,
                prev: () => {
                    let page =
                        (this.currentSection - 2) * this.numberPerSection + 1;
                    this.toPage(page);
                },
                next: () => {
                    let page = this.currentSection * this.numberPerSection + 1;
                    this.toPage(page);
                }
            };
        }
    },
    methods: {
        next() {
            this.toPage(this.meta.current_page + 1);
        },
        prev() {
            this.toPage(this.meta.current_page - 1);
        },
        toPage(page) {
            if (page < 1 || page > this.meta.last_page) {
                return;
            }

            this.$emit('pagination:switched', page);
            this.updateUrl(page);
        },
        updateUrl(page) {
            history.pushState(null, null, `?page=${page}`);
        }
    },
    render() {
        return this.$scopedSlots.default({
            pages: this.pages,
            sections: this.sections,
            switched: {
                toPage: this.toPage,
                next: this.next,
                prev: this.prev
            }
        });
    }
};
</script>

