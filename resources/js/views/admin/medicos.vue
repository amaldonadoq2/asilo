<template>
    <div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Medicos</h1>
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
            id="modalMedico"
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
                            <div class="row">
                                <div class="col">
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
                                <div class="col">
                                    <label for="telefono" class="col-form-label"
                                        >Telefono:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="telefono"
                                        v-model="registro.telefono"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="salario" class="col-form-label"
                                        >Salario:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="salario"
                                        v-model="registro.salario"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                                <div class="col">
                                    <label
                                        for="direccion"
                                        class="col-form-label"
                                        >Direccion:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="direccion"
                                        v-model="registro.direccion"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label
                                        for="especialidad"
                                        class="col-form-label"
                                        >Especialidad:</label
                                    >
                                    <!-- <input
                                        type="text"
                                        class="form-control"
                                        id="especialidad"
                                        v-model="registro.id_especialidad"
                                        :disabled="deshabilitar"
                                    /> -->
                                    <select
                                        class="custom-select"
                                        v-model="registro.id_especialidad"
                                    >
                                        <option
                                            v-for="especialidad in especialidades"
                                            :value="especialidad.id"
                                            :key="especialidad.id"
                                        >
                                            {{ especialidad.nombre }}
                                        </option>
                                    </select>
                                </div>
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
    name: "Medicos",
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
            registros: [],
            columnas: ["Nombre", "Acciones"],
            tituloModal: "",
            registro: {
                nombre: "",
                telefono: "",
                salario: "",
                direccion: "",
                id_especialidad: null
            },
            btnTexto: "",
            deshabilitar: false,
            especialidades: []
        };
    },
    methods: {
        async getRegistros() {
            let { data } = await axios.get("medicos");
            if (data.code === 200) {
                this.registros = data.datos;
                this.especialidades = data.especialidades;
            }
        },
        modalEditar(valor) {
            $("#modalMedico").modal("show");
            this.tituloModal = "Editar Medico";
            this.registro = valor;
            this.btnTexto = "Editar";
            this.deshabilitar = false;
        },
        modalCrear() {
            $("#modalMedico").modal("show");
            this.tituloModal = "Crear Medico";
            this.btnTexto = "Crear";
            this.deshabilitar = false;
        },
        modalEliminar(valor) {
            $("#modalMedico").modal("show");
            this.tituloModal = "Eliminar Medico";
            this.registro = valor;
            this.btnTexto = "Eliminar";
            this.deshabilitar = true;
        },
        modalCerrar() {
            $("#modalMedico").modal("hide");
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
            let { data } = await await axios.post("medicos", this.registro);
            this.registros.push(data.datos);
            this.modalCerrar();
            this.limpiarModelo();
        },
        async eliminarRegistro() {
            let resultado = await axios.delete(`medicos/${this.registro.uuid}`);
            this.registros.splice(
                this.registros.findIndex(v => v.uuid === this.registro.uuid),
                1
            );
            this.modalCerrar();
            this.limpiarModelo();
        },
        async editarRegistro() {
            let resultado = await axios.patch(
                `medicos/${this.registro.uuid}`,
                this.registro
            );
            $(".toast").toast("show");
            this.modalCerrar();
            this.limpiarModelo();
        }
    }
};
</script>
