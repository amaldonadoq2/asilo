<template>
    <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
    >
        <!-- Sidebar - Brand -->
        <router-link
            class="sidebar-brand d-flex align-items-center justify-content-center"
            to="/"
        >
            <div class="sidebar-brand-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Asilo</div>
        </router-link>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <router-link class="nav-link" to="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></router-link
            >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Modulos</div>

        <!-- Nav Item - Especialidades -->
        <li class="nav-item">
            <router-link class="nav-link" to="/admin/especialidades">
                <i class="fas fa-fw fa-table"></i>
                <span>Especialidades</span></router-link
            >
        </li>

        <!-- Nav Item - Medicos -->
        <li class="nav-item">
            <router-link class="nav-link" to="/admin/medicos">
                <i class="fas fa-fw fa-user-md"></i>
                <span>Medicos</span></router-link
            >
        </li>

        <!-- Nav Item - Medicos -->
        <li class="nav-item">
            <router-link class="nav-link" to="/admin/miembros">
                <i class="fas fa-fw fa-users"></i>
                <span>Miembros</span></router-link
            >
        </li>

        <!-- Nav Item - Pacientes -->
        <li class="nav-item">
            <router-link class="nav-link" to="/admin/pacientes">
                <i class="fas fa-fw fa-hospital-user"></i>
                <span>Pacientes</span></router-link
            >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
</template>

<script>
export default {
    name: "Sidebar"
};
</script>
