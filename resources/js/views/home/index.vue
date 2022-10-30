<template>
    <div>
        <Nav />
        <div class="masthead">
            <div class="text-center text-white">
                <h1 class="py-5 home-title">
                    Asilo de ancianos
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="text-center py-5 min-vh-50">
                <router-link to="/admin" class="btn btn-primary">
                    Ir al menu principal <i class="fas fa-chevron-right"></i
                ></router-link>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Nav from "../../components/Nav";
import Footer from "../../components/Footer";

export default {
    name: "Home",
    components: {
        Nav,
        Footer
    }
};
</script>

<style>
.home-title {
    font-size: 4rem;
}
.masthead {
    /* background: linear-gradient(0deg, #4e73df 0%, #36b9cc 100%); */
    background: url("https://img.freepik.com/vector-premium/enfermeras-que-cuidan-ancianos-asilo-ancianos_602838-22.jpg?w=2000");
    /*  padding-top: 5rem; */
    padding-top: 27rem;
    padding-bottom: 5rem;
    background-position: center;
    background-size: cover;
}
.min-vh-50 {
    min-height: 50vh !important;
}
</style>
