<template>
    <div class="container">
        <div class="card-columns">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Title
                    </h5>
                    <p class="card-text">
                        Description
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                projects: []
            };
        }
    }
</script>
