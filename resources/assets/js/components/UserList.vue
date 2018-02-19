<template>
    <div class="container mx-auto">
        <div class="card col-md-6 mx-auto px-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="user in users" :key="user.id">
                    <img src="http://via.placeholder.com/50x50" /> {{ user.name }}
                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-around mt-4">
            <v-paginator :meta="meta" @pagination:switched="getUsers">
                <div slot-scope="{pages, switched, sections}">
                    <ul class="pagination">
                        <li class="page-item" :class="{ disabled: meta.current_page==1 }" @click.prevent="switched.prev">
                            <a class="page-link" href="#" tabindex="-1">
                                Previous
                            </a>
                        </li>
                        <li class="page-item" v-if="sections.showPrev" @click.prevent="switched.toPage(1)">
                            <a class="page-link" href="#">
                                1
                            </a>
                        </li>
                        <li class="page-item" v-if="sections.showPrev" @click.prevent="sections.prev">
                            <a class="page-link" href="#">
                                ...
                            </a>
                        </li>
                        <li class="page-item"
                            v-for="(page, index) in pages"
                            :key="index"
                            @click.prevent="switched.toPage(page)"
                            :class="{active: page === meta.current_page}">
                            <a class="page-link" href="#">
                                {{ page }}
                            </a>
                        </li>
                        <li class="page-item" v-if="sections.showNext" @click.prevent="sections.next">
                            <a class="page-link" href="#">
                                ...
                            </a>
                        </li>
                        <li class="page-item" v-if="sections.showNext" @click.prevent="switched.toPage(meta.last_page)">
                            <a class="page-link" href="#">
                                {{ meta.last_page }}
                            </a>
                        </li>
                        <li class="page-item" :class="{ disabled: meta.current_page === meta.last_page }" @click.prevent="switched.next">
                            <a class="page-link" href="#">
                                Next
                            </a>
                        </li>
                    </ul>
                </div>
            </v-paginator>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users: [],
            meta: {}
        };
    },
    methods: {
        getUsers(page) {
            if (!page) {
                let query = location.search.match(/page=(\d+)/);
                page = query ? query[1] : 1;
            }

            axios.get(`/api/users?page=${page}`).then(res => {
                this.users = res.data.data;
                this.meta = res.data.meta;
            });
        }
    },

    mounted() {
        this.getUsers();
    }
};
</script>
