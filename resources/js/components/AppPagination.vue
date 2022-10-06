<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Previous -->
            <li
                class="page-item"
                role="button"
                v-if="currentPage > 1"
                @click="changePage(currentPage - 1)"
            >
                <span class="page-link" href="#">Previous</span>
            </li>

            <!-- CURRENT PAGE -->
            <li
                class="page-item"
                role="button"
                :class="{ active: page === currentPage }"
                v-for="page in lastPage"
                :key="page"
                @click="changePage(page)"
            >
                <nav class="page-link" href="#">{{ page }}</nav>
            </li>

            <!-- NEXT -->
            <li
                class="page-item"
                role="button"
                v-if="currentPage !== lastPage"
                @click="changePage(currentPage + 1)"
            >
                <nav class="page-link" href="#">Next</nav>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "AppPagination",

    props: {
        lastPage: Number,
        currentPage: Number,
    },
    methods: {
        changePage(page) {
            this.$emit("change-page", page);
        },
    },
};
</script>
