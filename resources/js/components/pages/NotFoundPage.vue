<template>
    <div
        class="d-flex text-dark justify-content-center align-items-center"
        id="not-found-page"
    >
        <div class="text-center">
            <h2>404 | Page not found</h2>
            <div>
                <router-link :to="{ name: 'home' }"
                    >Torna alla home</router-link
                >
            </div>
            <div>
                <button
                    type="button"
                    @click="$router.back()"
                    class="btn btn-secondary"
                >
                    Torna alla pagina precedente
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "NotFoundPage",
};
</script>
<style lang="scss">
#not-found-page {
    height: 90vh;
}
</style>
