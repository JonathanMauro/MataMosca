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
                    <div class="mb-2">
                        <select name="nivel" id="nivel" class="form-control">
                            <option value="">--Selecionar o nível --</option>
                            <option value="normal">Normal</option>
                            <option value="dificil">Dificil</option>
                            <option value="chucknorris">Chuck Norris</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-danger btn-lg" @click="iniciarJogo()">Iniciar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['imagem'],
    methods: {
        iniciarJogo() {

           const nivel = document.getElementById('nivel').value

           if(nivel === ''){
            alert('Selecione um nível para iniciar o jogo')
            return false
           }

           window.location.href = '/game?' + nivel

        }
    },

}
</script>
