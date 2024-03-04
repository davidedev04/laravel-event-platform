<script>
import axios from "axios";
export default {
    name: "AppHome",
    data() {
        return {
            // array dove ci sono gli eventi tramite la chiamata
            eventsArray: [],
            // variabile che serve per comparsa e scomparsa di tag in html
            ghostEvent: false,
            // variabile che rappresenterà un singolo elemento
            singleEvent: "",
        };
    },
    methods: {
        // chiamata per ottenere il singolo elemento
        showEvent(id) {
            axios
                // chiamata con aggiunta delid selezionato
                .get("http://localhost:8000/api/v1/events/" + id)
                .then((res) => {
                    this.singleEvent = res.data.events;
                    console.log("data: ", this.singleEvent);
                })
                .catch((err) => {
                    console.log(err);
                });
            // cambio valore della variabile per far comparire il singolo id
            this.ghostEvent = true;
        },
        turnBack() {
            this.ghostEvent = false;
        },
    },
    mounted() {
        // chiamata per ottenere tutti gli eventi
        axios
            .get("http://localhost:8000/api/v1/events")
            .then((res) => {
                this.eventsArray = res.data.events;
                console.log("event:", this.eventsArray);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>

<template>
    <div class="container">
        <div class="row text-center">
            <ul v-if="!ghostEvent" class="d-flex flex-wrap text-center">
                <li
                    v-for="(event, i) in eventsArray"
                    :key="i"
                    class="col-6 border p-3 bg-dark text-white"
                >
                    <h4>{{ event.nome }}</h4>
                    <div class="my-3">
                        <strong>luogo dell'evento:</strong> {{ event.luogo }}
                    </div>
                    <div>
                        <strong>data dell'evento:</strong> {{ event.data }}
                    </div>
                    <div class="my-3">
                        <strong>descrizione dell'evento:</strong>
                        {{ event.descrizione }}
                    </div>
                    <div class="my-3">
                        <strong>user che ha creato l'evento</strong>
                        {{ event.user.name }}
                    </div>
                    <div class="btn-group">
                        <a
                            href="#"
                            class="btn btn-primary"
                            @click="showEvent(event.id)"
                            >show event</a
                        >
                    </div>
                </li>
            </ul>
            <div v-else class="border p-3 bg-dark text-white">
                <h4>{{ singleEvent.nome }}</h4>
                <div class="my-3">
                    <strong>luogo dell'evento:</strong> {{ singleEvent.luogo }}
                </div>
                <div>
                    <strong>luogo dell'evento:</strong> {{ singleEvent.data }}
                </div>
                <div class="my-3">
                    <strong>luogo dell'evento:</strong>
                    {{ singleEvent.descrizione }}
                </div>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary" @click="turnBack"
                        >ritorna ad Home</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">

</style>
