<template>
    <div>

            <miactividad-component @add='addActividad'></miactividad-component>

            <actividades-component v-for='(actividad, index) of actividades' :key='index'
              :actividad='actividad' @eliminar='eliminarActividad(index)' @actualizar='actualizarActividad(index, ...arguments)'></actividades-component>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                actividades:[]
            }
        },
        mounted() {
            axios.get('/actividades').then((response)=> {
            this.actividades = response.data;
            });
        },
         methods:{
            addActividad(actividad){
                this.actividades.push(actividad);
            },
            eliminarActividad(index){
                this.actividades.splice(index, 1);
            },
            actualizarActividad(index, actividad){
                this.actividades[index]= actividad
            }
        }
    }
</script>
