<template>
    <div class="container container-task">
        <section  class="border-dashed border-2 border-blue-300 table p-8 mt-20 m-auto relative  ">
            <div class="relative">
            <textarea v-if="rol == true" v-model="description" type="textarea"
                      class="text-center shadow appearance-none border border-red-500 rounded w-full h-auto py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                      placeholder="¿Que esta pasando?" maxlength="200"></textarea>
            </div>
            <div class="text-center">
                <button v-if="update == 0 && rol == true " @click="saveTasks()"
                    class="bg-orange-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline "
                    type="submit" style="width: 150px;">
                    Publicar
                </button>
            </div>
            <br>
            <div  v-for="task in arrayTasks" :key="task.id"
                class="border-2 border-black h-auto w-56 sm:h-auto sm:w-72 md:h-auto md:w-72 lg:h-auto lg:w-72 xl:h-auto xl:w-72 relative bg-blue-200 opacity-75">

                <div class="inline-block h-auto w-8 sm:h-auto sm:w-8 md:h-auto md:w-24 lg:h-auto lg xl:h-auto xl:w-64 relative">
                    <img :src="'imagenes/user.jpg'">
                </div>
                <div class="break-words inline-block relative align-top w-8 pb-5 sm:text-lg md:text-sm lg:text-lg xl:text-xl h-auto w-56 sm:h-auto sm:w-72 md:h-auto md:w-68 lg:h-auto lg:w-68 xl:h-auto xl:w-68">
                    <h3 v-text="task.description"></h3>
                </div>

                <div class="absolute sm:text-lg md:text-xl lg:text-2xl xl:text-2xl">
                    <h1 v-text="task['name']"></h1>
                </div>
                <div class="text-xs text-right sm:text-lg md:text-xl lg:text-2xl xl:text-2xl relative mr-4">
                    <button id="btn-abrir-popup"><i   class="fas fa-user-edit "></i></button>
                    <button id="btn-abrir-popup1"><i class="fas fa-user-check "></i></button>
                    <button id="btn-abrir-popupEliUser" @click="deleteTask(task)"><i class="fas fa-user-times"></i></button>
                </div>
            </div>

        </section>

    </div>
</template>


<script>
    export default {
        data(){
            return{
                description:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                         ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las tareas de nuestra bd
                name:"",
                rol:false

            }
        },
        methods:{
            getTasks(){
                let me =this;
                let url = '/posts' //Ruta que hemos creado para que nos devuelva todas las tareas
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data['datos'];
                    me.rol=response.data['rol'];
                    console.log(response.data);
                })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            },
            saveTasks(){
                let me =this;
                let url = '/post' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'description':this.description,
                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/tareas/actualizar',{
                    'id':this.update,
                    'description':this.description,
                    'content':this.content,
                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.id
                let me =this;
                let url = '/tareas/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.description= response.data.description;

                })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            },
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
                let me =this;
                let id = data.id;
                console.log(id);
                if (confirm('¿Seguro que deseas borrar esta post?')) {
                    axios.delete('/post/delete/'+id
                    ).then(function (response) {
                        console.log(response);
                        me.getTasks();
                    })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.description = "";
            }
        },
        mounted() {
            this.getTasks();
        }
    }
</script>
