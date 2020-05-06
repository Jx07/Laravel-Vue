<template>
    <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registrar actividad</div>
    
                            <div class="card-body">
                                    <form @submit.prevent="nuevoNombre">
                                            <div class="form-group">
                                                <label for="actividad">Actividad</label>
                                                <input type="text" v-model="nombre" class="form-control" id="actividad" aria-describedby="emailHelp">
                                            </div>
                                            <button class="btn btn-primary">Registrar</button>
                                    </form>
                            </div>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre:''
            }
        },
        methods:{
            nuevoNombre(){
                const parametro= {
                    nombre:this.nombre
                };
                this.nombre='';
                axios.post('/actividades', parametro).then ((response)=> { 
                const actividad= response.data;
                this.$emit('add', actividad)
                });
                
            }
        },        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
