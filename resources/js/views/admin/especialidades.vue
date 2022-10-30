<template>
    <div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Especialidades</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEspecialidad"
                    @click="modalCrear"
                >
                    <i class="fas fa-plus" aria-hidden="true"></i>
                    Agregar Registro
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th v-for="columna in columnas" :key="columna">
                                    {{ columna }}
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th v-for="columna in columnas" :key="columna">
                                    {{ columna }}
                                </th>
                            </tr>
                        </tfoot>
                        <tbody v-if="registros.length > 0">
                            <tr
                                v-for="(registro, index) in registros"
                                :key="index"
                            >
                                <td>{{ registro.nombre }}</td>
                                <td>
                                    <div
                                        class="btn-group"
                                        role="group"
                                        aria-label="Basic mixed styles example"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-outline-danger"
                                            @click="modalEliminar(registro)"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary"
                                            @click="modalEditar(registro)"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="modalEspecialidad"
            tabindex="-1"
            aria-labelledby="modalEspecialidadLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1
                            class="modal-title fs-5"
                            id="modalEspecialidadLabel"
                        >
                            {{ tituloModal }}
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label"
                                    >Nombre:</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nombre"
                                    v-model="registro.nombre"
                                    :disabled="deshabilitar"
                                />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            @click="modalCerrar"
                        >
                            Cerrar
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="crearEditarOEliminar(btnTexto)"
                        >
                            {{ btnTexto }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";

export default {
    name: "Especialidades",
    mounted() {
        this.getRegistros();
        $("#dataTable").DataTable({
            language: {
                url:
                    "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    },
    created() {},
    data() {
        return {
            registros: [
                /* {
                    nombre: "Prueba 1"
                } */
            ],
            columnas: ["Nombre", "Acciones"],
            tituloModal: "",
            registro: {
                nombre: ""
            },
            btnTexto: "",
            deshabilitar: false
        };
    },
    methods: {
        async getRegistros() {
            let { data } = await axios.get("especialidades");
            if (data.code === 200) {
                this.registros = data.datos;
            }
        },
        modalEditar(valor) {
            $("#modalEspecialidad").modal("show");
            this.tituloModal = "Editar Especialidad";
            this.registro = valor;
            this.btnTexto = "Editar";
            this.deshabilitar = false;
        },
        modalCrear() {
            $("#modalEspecialidad").modal("show");
            this.tituloModal = "Crear Especialidad";
            this.btnTexto = "Crear";
            this.deshabilitar = false;
        },
        modalEliminar(valor) {
            $("#modalEspecialidad").modal("show");
            this.tituloModal = "Eliminar Especialidad";
            this.registro = valor;
            this.btnTexto = "Eliminar";
            this.deshabilitar = true;
        },
        modalCerrar() {
            $("#modalEspecialidad").modal("hide");
        },
        limpiarModelo() {
            this.registro = {
                nombre: ""
            };
        },
        crearEditarOEliminar(btn) {
            if (btn === "Editar") {
                this.editarRegistro();
            } else if (btn === "Crear") {
                this.crearRegistro();
            } else {
                this.eliminarRegistro();
            }
        },
        async crearRegistro() {
            let { data } = await await axios.post(
                "especialidades",
                this.registro
            );
            this.registros.push(data.datos);
            this.modalCerrar();
            this.limpiarModelo();
        },
        async eliminarRegistro() {
            let resultado = await axios.delete(
                `especialidades/${this.registro.uuid}`
            );
            this.registros.splice(
                this.registros.findIndex(v => v.uuid === this.registro.uuid),
                1
            );
            this.modalCerrar();
            this.limpiarModelo();
        },
        async editarRegistro() {
            let resultado = await axios.patch(
                `especialidades/${this.registro.uuid}`,
                this.registro
            );
            $(".toast").toast("show");
            this.modalCerrar();
            this.limpiarModelo();
        }
    }
};
</script>
