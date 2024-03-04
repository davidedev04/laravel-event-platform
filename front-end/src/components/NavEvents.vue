<script>
export default {
    name: "nav",
};
</script>

<template>
    <!-- in questa navbar quando si rimpicciolisce lo schermo non fa lo scroll down -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <h1>
                <a class="navbar-brand">eventi disponibili</a>
            </h1>
            <a class="nav-link active" aria-current="page" href="">
                <router-link :to="{ name: 'home' }"> home </router-link>
            </a>
            <a class="nav-link active" aria-current="page" href="">
                <router-link :to="{ name: 'about' }"> about us </router-link>
            </a>
            <a class="nav-link" href="">
                <!-- link per page contacts -->
                <router-link :to="{ name: 'tags' }"> contacts </router-link>
            </a>
            <form class="d-flex">
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                />
                <button class="btn btn-outline-success" type="submit">
                    Search
                </button>
            </form>
        </div>
    </nav>
</template>

<style lang="scss">
@use "./../style/generals.scss";
</style>
