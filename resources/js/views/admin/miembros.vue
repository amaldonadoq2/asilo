<template>
    <div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Miembros</h1>
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
            id="modalMiembro"
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
                                        >Nombres:</label
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
                                    <label for="nombre" class="col-form-label"
                                        >Apellidos:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nombre"
                                        v-model="registro.apellido"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                                <div class="col">
                                    <label for="nombre" class="col-form-label"
                                        >CUI:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nombre"
                                        v-model="registro.cui"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="telefono" class="col-form-label"
                                        >Encargado:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="telefono"
                                        v-model="registro.encargado"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                                <div class="col">
                                    <label for="telefono" class="col-form-label"
                                        >Direccion:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="telefono"
                                        v-model="registro.direccion"
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
                                        >Enfermedades:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="salario"
                                        v-model="registro.enfermedades"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                                <div class="col">
                                    <label
                                        for="direccion"
                                        class="col-form-label"
                                        >Fecha nacimiento:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="direccion"
                                        v-model="registro.fecha_nacimiento"
                                        :disabled="deshabilitar"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label
                                        for="especialidad"
                                        class="col-form-label"
                                        >Tipo de sangre:</label
                                    >
                                    <select
                                        class="custom-select"
                                        v-model="registro.id_tipo_sangre"
                                    >
                                        <option
                                            v-for="tipo in tiposSangre"
                                            :value="tipo.id"
                                            :key="tipo.id"
                                        >
                                            {{ tipo.nombre }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label
                                        for="especialidad"
                                        class="col-form-label"
                                        >Generos:</label
                                    >
                                    <select
                                        class="custom-select"
                                        v-model="registro.id_genero"
                                    >
                                        <option
                                            v-for="genero in generos"
                                            :value="genero.id"
                                            :key="genero.id"
                                        >
                                            {{ genero.nombre }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label
                                        for="especialidad"
                                        class="col-form-label"
                                        >Estado Civil:</label
                                    >
                                    <select
                                        class="custom-select"
                                        v-model="registro.id_estado_civil"
                                    >
                                        <option
                                            v-for="estado in estadosCivil"
                                            :value="estado.id"
                                            :key="estado.id"
                                        >
                                            {{ estado.nombre }}
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
    name: "Miembros",
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
                cui: "",
                nombre: "",
                apellido: "",
                encargado: "",
                direccion: "",
                telefono: "",
                enfermedades: "",
                fecha_nacimiento: "",
                id_tipo_sangre: null,
                id_genero: null,
                id_estado_civil: null
            },
            btnTexto: "",
            deshabilitar: false,
            estadosCivil: [],
            generos: [],
            tiposSangre: []
        };
    },
    methods: {
        async getRegistros() {
            let { data } = await axios.get("miembros");
            if (data.code === 200) {
                this.registros = data.datos;
                this.estadosCivil = data.registros.estadosCivil;
                this.generos = data.registros.generos;
                this.tiposSangre = data.registros.tiposSangre;
            }
        },
        modalEditar(valor) {
            $("#modalMiembro").modal("show");
            this.tituloModal = "Editar Miembro";
            this.registro = valor;
            this.btnTexto = "Editar";
            this.deshabilitar = false;
        },
        modalCrear() {
            $("#modalMiembro").modal("show");
            this.tituloModal = "Crear Miembro";
            this.btnTexto = "Crear";
            this.deshabilitar = false;
        },
        modalEliminar(valor) {
            $("#modalMiembro").modal("show");
            this.tituloModal = "Eliminar Miembro";
            this.registro = valor;
            this.btnTexto = "Eliminar";
            this.deshabilitar = true;
        },
        modalCerrar() {
            $("#modalMiembro").modal("hide");
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
            let { data } = await await axios.post("miembros", this.registro);
            this.registros.push(data.datos);
            this.modalCerrar();
            this.limpiarModelo();
        },
        async eliminarRegistro() {
            let resultado = await axios.delete(
                `miembros/${this.registro.uuid}`
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
                `miembros/${this.registro.uuid}`,
                this.registro
            );
            $(".toast").toast("show");
            this.modalCerrar();
            this.limpiarModelo();
        }
    }
};
</script>
