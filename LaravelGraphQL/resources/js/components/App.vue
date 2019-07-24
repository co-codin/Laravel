<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Project Management
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link">Dashboard</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link">Create Project</router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Logout</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link">Register</router-link>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <section id="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
