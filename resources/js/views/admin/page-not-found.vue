<template>
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Pagina no encontrada</p>
        <p class="text-gray-500 mb-0">
            Parece que encontraste una falla
        </p>
        <router-link to="/admin">&larr; Regresar al menu principal</router-link>
    </div>
</template>

<script>
export default {
    name: "PageNotFound"
};
</script>
