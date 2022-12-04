<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class=" "><link href="{{ asset('img\descargar.jpg') }}" rel="icon" type="image/jpg"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Suspensión<sup>App</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" class="nav-link">
        <span>MENÚ</span></a>
    </li>
    
    

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="far fa-fw fa-home-lg-alt"></i>
            <span>INICIO</span>
        </a>
    </li>
    <!-- Heading -->
    <!--<div class="sidebar-heading">
        MENÚ
    </div>-->

    <!-- Nav Item - Pages Collapse Menu -->
    <!--<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Administración</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">
                    <i class="fas fa-users fa-fw"></i> Usuarios
                </a>
                <a class="collapse-item" href="cards.html">
                    <i class="fas fa-id-card fa-fw"></i> Roles
                </a>
                <a class="collapse-item" href="cards.html">
                    <i class="far fa-hand-paper fa-fw"></i> Permisos
                </a>
            </div>
        </div>
    </li>-->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSus"
            aria-expanded="true" aria-controls="collapseSus">
            <i class="fas fa-fw fa-file"></i>
            <span>Suspensiones</span>
        </a>
        <div id="collapseSus" class="collapse" aria-labelledby="headingSus" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a class="collapse-item" href="{{ url('oficios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Oficios 
                </a>
                
                <a class="collapse-item" href="{{ url('createsuspencions') }}">
                    <i class="fas fa-id-card fa-fw"></i> Suspensiones 
                </a>
                

            </div>
        </div>  
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRev"
            aria-expanded="true" aria-controls="collapseRev">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Revisiones</span>
        </a>
        <div id="collapseRev" class="collapse" aria-labelledby="headingRev" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                
                
                <a class="collapse-item" href="{{ url('revofi') }}">
                    <i class="fas fa-id-card fa-fw"></i> Revisión oficios
                </a>
                
                <a class="collapse-item" href="{{ url('revsusp') }}">
                    <i class="fas fa-id-card fa-fw"></i> Revisión suspensión
                </a>

                <a class="collapse-item" href="{{ url('formularios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Formularios
                </a>

                <a class="collapse-item" href="{{ url('arch') }}">
                    <i class="fas fa-id-card fa-fw"></i> Archivados
                </a>

                <a class="collapse-item" href="{{ url('agregarformularios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Agregar formulario
                </a>
                <a class="collapse-item" href="{{ url('reportes') }}">
                    <i class="fas fa-id-card fa-fw"></i> Reportes
                </a>
                
            </div>
        </div>  
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePre"
            aria-expanded="true" aria-controls="collapseRev">
            <i class="fas fa-money-bill-alt"></i>
            <span>Prestaciones</span>
        </a>
        <div id="collapsePre" class="collapse" aria-labelledby="headingPre" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a class="collapse-item" href="{{ url('afiliados') }}">
                    <i class="fas fa-id-card fa-fw"></i> Afiliados
                </a>
                
                <a class="collapse-item" href="{{ url('tipo_afiliados') }}">
                    <i class="fas fa-id-card fa-fw"></i> Tipo Afiliados
                </a>

                <a class="collapse-item" href="{{ url('revreq') }}">
                    <i class="fas fa-id-card fa-fw"></i> Validar oficios
                </a>
                
            </div>
        </div>  
    </li>



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
            aria-expanded="true" aria-controls="collapseCat">
            <i class="fas fa-fw fa-bars"></i>
            <span>Catálogos</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="headingCat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a class="collapse-item" href="{{ url('areas') }}">
                    <i class="fas fa-id-card fa-fw"></i> Areas  
                </a>
                
                <a class="collapse-item" href="{{ url('especialidades') }}">
                    <i class="fas fa-id-card fa-fw"></i> Especialidad  
                </a>
                
                <a class="collapse-item" href="{{ url('clinicas_servicios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Clinicas/Servicios
                </a>
                
                <a class="collapse-item" href="{{ url('formularios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Formularios
                </a>
                
                <a class="collapse-item" href="{{ url('medico') }}">
                    <i class="fas fa-id-card fa-fw"></i> Medicos
                </a>
                <a class="collapse-item" href="{{ url('riesgos') }}">
                    <i class="fas fa-id-card fa-fw"></i> Riesgos
                </a>
                <a class="collapse-item" href="{{ url('dependencias') }}">
                    <i class="fas fa-id-card fa-fw"></i> Dependencias
                </a>
                <a class="collapse-item" href="{{ url('afiliados') }}">
                    <i class="fas fa-id-card fa-fw"></i> Afiliados
                </a>
                
            </div>
        </div>  
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUs"
            aria-expanded="true" aria-controls="collapseUs">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseUs" class="collapse" aria-labelledby="headingUs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <!--<a class="collapse-item" href="{{ url('tipoUsuarios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Tipos usuarios
                </a>-->
                
                <a class="collapse-item" href="{{ url('roles') }}">
                    <i class="fas fa-id-card fa-fw"></i> Roles
                </a>
                
                
                <a class="collapse-item" href="{{ url('usuarios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Usuarios
                </a>
                

                <!--<a class="collapse-item" href="{{ url('rolUsuarios') }}">
                    <i class="fas fa-id-card fa-fw"></i> Rol Usuarios
                </a>  -->

            </div>
        </div>  
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>


    <!-- Nav Item - Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->