<script>
import mainEvents from "./components/mainEvents.vue";
import Nav from "./components/NavEvents.vue";

export default {
    components: {
        mainEvents,
        Nav,
    },
};
</script>

<template>
    <div class="bg-primary">
        <header class="pb-5">
            <Nav />
        </header>
        <main class="mt-5">
            <mainEvents />
        </main>
    </div>
</template>

<style scoped lang="scss">
@use "./style/generals.scss";
</style>
