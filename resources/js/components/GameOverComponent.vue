<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <img :src="this.imagem">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                   <button type="button" class="btn btn-danger btn-lg" @click="reiniciar()">Reiniciar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['imagem'],
        methods: {
            reiniciar() {
                window.location.href='/'
            }
        },

    }
</script>
