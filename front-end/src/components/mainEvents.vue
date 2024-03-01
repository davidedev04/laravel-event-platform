<script>
import axios from "axios";
export default {
    name: "mainEvents",
    data() {
        return {
            eventsArray : [],
            ghostEvent: false,
            singleEvent: ''
        }
    },
    methods: {
        showEvent(i) {

            this.singleEvent = i;
            axios.get("http://localhost:8000/api/v1/events", this.singleEvent)
                .then((res) => {
                    
                    const data = res.data;
                    console.log('data: ', data);

                })
                .catch(err => {
                    console.log(err);
                })

            this.ghostEvent = true;


        }
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/events")
                .then((res) => {
                    
                    const data = res.data;
                    console.log('data: ', data);

                    this.eventsArray = res.data.events;
                    console.log('event:', this.eventsArray);

                })
                .catch(err => {
                    console.log(err);
                })
    }
};

</script>

<template>
    
    <div>
        <h1> EVENTI </h1>
        <ul v-if="(!ghostEvent)">
            <li v-for="(event,i) in eventsArray" :key="i">
                <h4> {{ event.nome }} </h4>
                <div> {{ event.luogo }}</div>
                <div> {{ event.data }}</div>
                <div> {{ event.descrizione }}</div>
                <button @click="showEvent(event.id)"> Show </button>
            </li>
        </ul>
        <div v-else> 
            <!-- <h4> {{ indexEvent }} </h4> -->
                
    
        </div>

    </div>


    
</template>

<style lang="scss">
@use "./../style/generals.scss";
</style>
