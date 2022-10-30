<template>
    <div>
        <Nav />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div
                                    class="col-lg-6 d-none d-lg-block bg-password-image"
                                ></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div v-if="!emailSent">
                                            <div class="text-center">
                                                <h1
                                                    class="h4 text-gray-900 mb-2"
                                                >
                                                    ¿Olvidaste tu contraseña ?
                                                </h1>
                                                <p class="mb-4">
                                                    Solo ingresa tu correo
                                                    electrónico a continuación y
                                                    te enviaremos un enlace para
                                                    restablecer tu ¡contraseña!
                                                </p>
                                            </div>
                                            <form
                                                class="user"
                                                @submit.prevent="forgot"
                                            >
                                                <div class="form-group">
                                                    <input
                                                        type="email"
                                                        class="form-control form-control-user"
                                                        id="exampleInputEmail"
                                                        aria-describedby="emailHelp"
                                                        placeholder="Dirección de correo electronico"
                                                        v-model="email"
                                                    />
                                                </div>
                                                <LoadingButton
                                                    text="Reiniciar contraseña"
                                                    v-bind:isLoading="isLoading"
                                                />
                                            </form>
                                        </div>
                                        <div v-else>
                                            <span class="h4">
                                                <i
                                                    class="far fa-check-circle text-success"
                                                ></i>
                                                ¡Consultar su correo
                                                electrónico!
                                            </span>
                                        </div>
                                        <hr />
                                        <div class="text-center">
                                            <router-link
                                                class="small"
                                                to="/login"
                                                >¿Ya tienes una cuenta? ¡Inicia
                                                sesión!</router-link
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import * as notify from "../../utils/notify.js";
import Nav from "../../components/Nav";
import LoadingButton from "../../components/LoadingButton";

export default {
    name: "Forgot",
    components: {
        Nav,
        LoadingButton
    },
    data() {
        return {
            email: this.email,
            isLoading: false,
            emailSent: false
        };
    },
    methods: {
        async forgot() {
            this.isLoading = true;
            try {
                await axios.post("forgot", {
                    email: this.email
                });
                this.isLoading = false;
                this.emailSent = true;
            } catch (error) {
                notify.authError(error);
                this.isLoading = false;
            }
        }
    }
};
</script>
