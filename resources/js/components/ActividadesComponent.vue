<template>
    <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Fecha: {{actividad.created_at}} </div>
    
                            <div class="card-body">
                                    
                                            <div class="form-group">
                                                <input v-if="modo_edicion" v-model="actividad.nombre" type="text" class="form-control text">
                                                <p v-else><strong>{{actividad.nombre}}</strong></p>
                                                
                                            </div>                                        
                                            <button v-if="!modo_edicion" class="btn btn-warning" @click='editar()'>Editar</button>
                                            <button v-else class="btn btn-success" @click='actualizar()'>Guardar Cambios</button>
                                            <button class="btn btn-danger" @click='eliminar()'>Elimnar</button>
                                    
                            </div>
                    </div>
                </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                modo_edicion:false
            }
        },
        props:['actividad'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            eliminar(){
                axios.delete(`/actividades/${this.actividad.id}`).then(() => {
                    this.$emit('eliminar');
                });
                                
            },
            editar(){
                this.modo_edicion= true
            },
            actualizar(){
                const params= {
                    nombre: this.actividad.nombre
                };
                axios.put(`/actividades/${this.actividad.id}`, params).then((response)=>{
                this.modo_edicion = false;
                const actividad= response.data;
                this.$emit('actualizar', actividad)
                });
                
                
            }
        }
    }
</script>
